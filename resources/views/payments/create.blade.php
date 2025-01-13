<x-layout>
    <script src="https://js.stripe.com/v3/"></script>

    <div class="flex items-center justify-center min-h-screen px-4 py-12 bg-gray-100 sm:px-6 lg:px-8">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h1 class="mb-8 text-3xl font-bold text-center text-gray-900">بوباة الدفع للخدمة </h1>

    <!-- ملخص الخدمة والمبلغ -->
    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
        <h2 class="pb-4 text-xl font-bold text-gray-800 border-b">تفاصيل الطلب</h2>
        <div class="mt-4 space-y-4">
            <div class="flex items-center justify-between">
                <span class="font-medium text-gray-700">نوع الحزمة</span>
                <span class="text-gray-600">{{ $appointment->package->name }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="font-medium text-gray-700">المبلغ</span>
                <span class="text-gray-600">${{ $appointment->package->price }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="font-medium text-gray-700">رقم الطلب</span>
                <span class="text-gray-600">{{ $appointment->id }}</span>
            </div>
        </div>
    </div>
       <!-- بوابات الدفع المتاحة -->
       <div class="mb-6">
        <h2 class="mb-4 text-lg font-semibold text-gray-700">بوابات الدفع المتاحة:</h2>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center justify-center p-4 rounded-lg shadow bg-gray-50">
                <img src="https://cdn.brandfetch.io/idhem73aId/theme/dark/logo.svg?c=1bfwsmEH20zzEfSNTed" alt="Visa" class="h-5">
            </div>
            <div class="flex items-center justify-center p-4 rounded-lg shadow bg-gray-50">
                <img src="https://cdn.brandfetch.io/idFw8DodCr/theme/dark/symbol.svg?c=1bfwsmEH20zzEfSNTed" alt="Mastercard" class="h-5">
            </div>
            <div class="flex items-center justify-center p-4 rounded-lg shadow bg-gray-50">
                <img src="https://cdn.brandfetch.io/id-Wd4a4TS/theme/dark/id31tBizMM.svg?c=1bfwsmEH20zzEfSNTed" alt="PayPal" class="h-5">
            </div>
            <div class="flex items-center justify-center p-4 rounded-lg shadow bg-gray-50">
                <img src="https://cdn.brandfetch.io/idxAg10C0L/theme/dark/logo.svg?c=1bfwsmEH20zzEfSNTed" alt="Stripe" class="h-5">
            </div>
        </div>
    </div>

            <form id="payment-form" class="space-y-6">
                <!-- حقل معرف الموعد (مخفي) -->
                <input type="hidden" name="appointment_id" id="appointment_id" value="{{ $appointment->id }}">

                <!-- حقل معرف الخدمة (مخفي) -->
                <input type="hidden" name="package_id" id="package_id" value="{{ $appointment->package_id }}">

                <!-- حقل تفاصيل البطاقة -->
                <div>
                 
                  <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Card Details</label>

                    <!-- حقل رقم البطاقة -->
                    <div id="card-number-element" class="p-3 mb-4 border border-gray-300 rounded-md shadow-sm"></div>

                    <!-- الحقول المتجاورة لتاريخ انتهاء البطاقة ورمز CVV -->
                    <div class="flex space-x-4">
                        <div id="card-expiry-element" class="w-1/2 p-3 border border-gray-300 rounded-md shadow-sm"></div>
                        <div id="card-cvc-element" class="w-1/2 p-3 border border-gray-300 rounded-md shadow-sm"></div>
                    </div>
                </div>

                <!-- زر الدفع -->
                <button id="submit-button" type="submit"
                    class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Pay Now
                </button>

                <!-- رسالة الدفع -->
                <div id="payment-message" class="hidden mt-4 text-sm text-center"></div>

                <!-- مؤشر التحميل -->
                <div id="loading-spinner" class="flex justify-center hidden mt-4">
                    <div class="w-8 h-8 border-b-2 border-gray-900 rounded-full animate-spin"></div>
                </div>
                <div id="payment-message" class="hidden mt-4 text-sm text-center">
                    <p id="payment-success-message" class="text-green-600"></p>
                    <a id="invoice-download-link" href="#" target="_blank" class="inline-block px-4 py-2 mt-2 text-white bg-blue-600 rounded">
                        Download Invoice
                    </a>
                </div>


            </form>
        </div>
    </div>

    <script>
        const stripe = Stripe("{{ config('services.stripe.STRIPE_KEY') }}");
        const elements = stripe.elements();
         // إنشاء الحقول
         const cardNumber = elements.create('cardNumber', { style: { base: { fontSize: '16px' } } });
        const cardExpiry = elements.create('cardExpiry', { style: { base: { fontSize: '16px' } } });
        const cardCvc = elements.create('cardCvc', { style: { base: { fontSize: '16px' } } });

        // ربط الحقول بـ DOM
        cardNumber.mount('#card-number-element');
        cardExpiry.mount('#card-expiry-element');
        cardCvc.mount('#card-cvc-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const paymentMessage = document.getElementById('payment-message');
        const loadingSpinner = document.getElementById('loading-spinner');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            console.log('Form submitted'); // تسجيل بدء عملية الدفع

            // تعطيل زر الدفع وإظهار مؤشر التحميل
            submitButton.disabled = true;
            loadingSpinner.classList.remove('hidden');
            paymentMessage.classList.add('hidden'); // إخفاء رسالة الخطأ السابقة

            try {
                // إنشاء PaymentIntent
                const response = await fetch('/payments/process-payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        amount: {{ $appointment->package->price * 100 }},
                        currency: 'usd', // العملة
                        // method: 'card', // طريقة الدفع
                        appointment_id: document.getElementById('appointment_id').value,
                        package_id: document.getElementById('package_id').value,
                    }),
                });

                const data = await response.json();
                console.log('PaymentIntent created:', data);

                if (data.error) {
                    console.error('Error creating PaymentIntent:', data.error);
                    paymentMessage.textContent = data.error;
                    paymentMessage.classList.remove('hidden');
                    paymentMessage.classList.add('text-red-600');
                    submitButton.disabled = false;
                    loadingSpinner.classList.add('hidden');
                    return;
                }

                // التحقق من وجود clientSecret
                if (!data.clientSecret) {
                    throw new Error('clientSecret is missing');
                }

                // تأكيد الدفع باستخدام clientSecret
                const { error, paymentIntent } = await stripe.confirmCardPayment(data.clientSecret, {
                    payment_method: {
                        card: cardNumber,
                    },
                });
   // الحصول على طريقة الدفع
   const paymentMethod = paymentIntent.payment_method;
   console.log('paymentMethod',paymentMethod);
                if (error) {
                    let errorMessage = error.message;
                    if (error.code === 'card_declined') {
                        errorMessage = 'Your card was declined. Please check your card details or use a different card.';
                    } else if (error.code === 'insufficient_funds') {
                        errorMessage = 'Insufficient funds. Please use a different card or contact your bank.';
                    }

                    paymentMessage.textContent = errorMessage;
                    paymentMessage.classList.remove('hidden');
                    paymentMessage.classList.add('text-red-600');
                    submitButton.disabled = false;
                    loadingSpinner.classList.add('hidden');

                    // إرسال بيانات الدفع الفاشلة إلى الخادم
                    await fetch('/payments/payment/failure', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            package_id: document.getElementById('package_id').value,
                            appointment_id: document.getElementById('appointment_id').value,
                            amount: {{ $appointment->package->price }},
                            currency: 'usd',
                            method: paymentMethod,
                            payment_intent_id: paymentIntent.id,
                            status: 'failed',
                            invoice_id: data.invoiceID,
                            invoice_pdf_url :data.invoice_pdf_url,
                            transactions_data: JSON.stringify(paymentIntent),
                        }),
                    });

                    window.location.href = "{{ route('payment.failure') }}";
                } else {
                    console.log('Payment succeeded:', paymentIntent);
                    paymentMessage.textContent = 'Payment succeeded!';
                    paymentMessage.classList.remove('hidden');
                    paymentMessage.classList.add('text-green-600');
                    submitButton.disabled = true;
                    loadingSpinner.classList.add('hidden');

                    const invoiceLink = document.createElement('a');
                    invoiceLink.href = data.invoice_pdf_url;
                    invoiceLink.textContent = 'Download Invoice';
                    invoiceLink.classList.add('block', 'text-center', 'text-blue-600', 'mt-4');
                    paymentMessage.appendChild(invoiceLink);

                    const paymentMessages = document.getElementById('payment-message');
                    const paymentSuccessMessage = document.getElementById('payment-success-message');
                    const invoiceDownloadLink = document.getElementById('invoice-download-link');

                    if (data.invoice_pdf_url) {
                        paymentMessages.classList.remove('hidden');
                        paymentSuccessMessage.textContent = 'Payment succeeded!';
                        invoiceDownloadLink.href = data.invoice_pdf_url;
                    }


                    const successResponse = await fetch('/payments/payment/success', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            package_id: document.getElementById('package_id').value,
                            appointment_id: document.getElementById('appointment_id').value,
                            amount: {{ $appointment->package->price  }},
                            currency: 'usd',
                            method: paymentMethod,
                            payment_intent_id: paymentIntent.id,
                            status: 'complete',
                            invoice_id: data.invoiceID,
                            invoice_pdf_url :data.invoice_pdf_url,
                            transactions_data: JSON.stringify(paymentIntent),
                        }),
                    });

                    if (successResponse.ok) {
                        // إعادة التوجيه إلى صفحة نجاح الدفع
                        window.location.href = "{{ route('payment.success.redirect') }}";
                    } else {
                        console.error('Failed to save payment data');
                    }
                }
            } catch (error) {
                console.error('An error occurred:', error);
                paymentMessage.textContent = 'An error occurred. Please try again.';
                paymentMessage.classList.remove('hidden');
                paymentMessage.classList.add('text-red-600');
                submitButton.disabled = false;
                loadingSpinner.classList.add('hidden');
            }
        });
    </script>
</x-layout>
