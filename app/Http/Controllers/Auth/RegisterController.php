<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    //
    public function register(){

        return view('auth.register');
    }
    public function store(RegisterRequest $request){
        $validated=$request->validated();

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
        ]);
            return redirect('/login')->with('success', 'successfully create account');

    }
}
