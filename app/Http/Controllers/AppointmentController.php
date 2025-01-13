<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Package;

class AppointmentController extends Controller
{

    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }
    public function showAppointmentForm(Package $package)
    {


        $daysOfWeek = [
            'السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'
        ];

        return view('user.appointments.create', compact('daysOfWeek' ,'package'));
    }
    public function getAvailableTimes(Request $request)
    {
        $date = $request->input('date'); // التاريخ المختار
        // قم بجلب التوقيتات المتاحة لهذا التاريخ من قاعدة البيانات
        $availableTimes = ['09:00', '10:00', '11:00', '12:00']; // مثال بسيط
        return response()->json($availableTimes);
    }

public function store(StoreAppointmentRequest $request)
{

    $appointment=$this->appointmentService->createAppointment($request->validated());
    return redirect()->route('payments.index', $appointment)->with('success', 'تم حجز الموعد بنجاح!');

}
}
