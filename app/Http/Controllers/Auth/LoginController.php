<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function login(Request $request)
    {
        $packageId = $request->query('package_id');
        if ($packageId) {
            session(['package_id' => $packageId]);
        }

        return view('auth.login');
    }

    // معالجة تسجيل الدخول
    public function store(LoginRequest $request)
    {        $validated = $request->validated();
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            if (session()->has('package_id')) {
                $packageId = session('package_id');
                session()->forget('package_id');
                return redirect()->route('services.show', $packageId);
            }
            return redirect()->intended('/');
        }

        // إذا فشل تسجيل الدخول
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');

    }
}
