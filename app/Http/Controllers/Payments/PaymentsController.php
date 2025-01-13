<?php

namespace App\Http\Controllers\Payments;


use Stripe\Stripe;
use Stripe\Invoice;
use App\Models\User;
use Stripe\Customer;
use App\Models\Payment;
use App\Models\Service;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use App\Models\Preference;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionSuccessMail;

class PaymentsController extends Controller
{
    //
    public function index(Appointment $appointment)
    {

        session()->forget('package_id');
        $appointment=Appointment::with(['package'])->where('id',$appointment->id)->first();
       
        return view('payments.create', compact('appointment'));
    }
    // معالجة عملية الدفع
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.STRIPE_SECRET'));

        try {
            $user = auth()->user();
            $customerId = $user->stripe_customer_id;

            // Create a new Stripe customer if one doesn't exist
            if (!$customerId) {
                $customer = \Stripe\Customer::create([
                    'email' => $user->email,
                    'name' => $user->name,
                    'metadata' => [
                        'user_id' => $user->id,
                    ],
                ]);
                $customerId = $customer->id;

                // Save the customer ID in the database
                $user->stripe_customer_id = $customerId;
                $user->save();
            }

            // Create a PaymentIntent for upfront payment confirmation
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount * 100,
                'currency' => $request->currency,
                'customer' => $customerId,
                'metadata' => [
                    'appointment_id' => $request->appointment_id,
                    'package_id' => $request->package_id,
                ],
            ]);


            \Stripe\InvoiceItem::create([
                'customer' => $customerId,
                'amount' => $request->amount * 100,
                'currency' => $request->currency,
                'description' => 'Payment for service',
            ]);


            $invoice = \Stripe\Invoice::create([
                'customer' => $customerId,
                'auto_advance' => true,
                'collection_method' => 'send_invoice',
                'days_until_due' => 30,
            ]);

            $invoice->sendInvoice();

            return response()->json([
                'clientSecret' => $paymentIntent->client_secret,
                'invoiceID' => $invoice->id,
                'invoice_pdf_url' => $invoice->invoice_pdf,
            ]);
        } catch (\Exception $e) {
            // Log errors
            Log::error('Payment processing error', ['error' => $e->getMessage()]);

            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // تخزين بيانات الدفع الناجحة
    public function paymentSuccess(Request $request)
    {
        Log::info("Payment Success Request Datassss:fferrererghgef", $request->all());

        try {
            // التحقق من وجود البيانات المطلوبة
            if (!$request->has(['package_id', 'appointment_id', 'amount', 'currency', 'method', 'payment_intent_id'])) {
                throw new \Exception("Missing required fields in the request.", 400);
            }

            if (!is_numeric($request->amount) || $request->amount <= 0) {
                throw new \Exception("Invalid amount value.", 400);
            }

            Payment::create([
                'package_id' => $request->package_id,
                'appointment_id' => $request->appointment_id,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'method' => $request->method,
                'invoice_id' => $request->invoice_id,
                'invoice_pdf_url' => $request->invoice_pdf_url,
                'status' => $request->status,
                'transaction_id' => $request->payment_intent_id,
                'transactions_data' => json_encode($request->all()),
            ]);

            // تحديث حالة الموعد
            $appointment = Appointment::find($request->appointment_id);
            $appointment->status = 'complete';
            $appointment->save();

            try {
                $userEmail = User::where('id', auth()->user()->id)->pluck('email')->first();

                Mail::to($userEmail)->send(new SubscriptionSuccessMail('m.bander.it@gmail.com'));
            } catch (\Exception $e) {
                Log::info('error send:' . $e->getMessage());
            }
            return response()->json(['message' => 'Payment succeeded!']);
        } catch (\Exception $e) {
            Log::error("Error in payment" . $e->getMessage(), [
                'request_data' => $request->all(),
                'error_trace' => $e->getTraceAsString(),
            ]);

            // تحديد نوع الخطأ
            $errorType = 'general_error';
            $errorCode = $e->getCode() ?: 500;

            if ($e->getCode() === 400) {
                $errorType = 'validation_error';
            } elseif (strpos($e->getMessage(), 'SQLSTATE') !== false) {
                $errorType = 'database_error';
            }

            // إرجاع رسالة خطأ مفصلة
            return response()->json([
                'error_type' => $errorType,
                'error_message' => $e->getMessage(),
            ], $errorCode);
        }
    }

    public function showSuccessPage()
    {
        return view('payments.success');
    }

    // تخزين بيانات الدفع الفاشلة
    public function paymentFailure(Request $request)
    {
        $paymentMethod = PaymentMethod::retrieve($request->method);

        $cardBrand = $paymentMethod->card->brand; // نوع البطاقة (Visa, Mastercard, إلخ)
        // $cardLast4 = $paymentMethod->card->last4;

        Payment::create([
            'package_id' => $request->package_id,
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'method' => $cardBrand,
            'status' => 'failed',
            'transaction_id' => $request->payment_intent_id,
            'transactions_data' => json_encode($request->all()),
        ]);

        return response()->json(['message' => 'Payment failed!']);
    }
}
