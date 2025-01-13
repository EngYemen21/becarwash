<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Stripe\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // return view('user.dashboard.index');
    }

    public function appointments()
    {
        $user = auth()->user();
        $appointments = $user->appointments()->with(['user','location','payment' ,'package' ,'car'])->get();
        return view('user.dashboard.appointments', compact('appointments'));
    }

    public function payments()
    {
        $user = auth()->user();
        $payments = $user->appointments()->with(['payment','package'])->where('status','complete')->get();
        return view('user.dashboard.payments', compact('payments'));
    }
    public function cars()
    {
        $user = auth()->user();
        $cars = $user->cars()->with('user')->get();

        return view('user.dashboard.cars', compact('cars'));
    }
}
