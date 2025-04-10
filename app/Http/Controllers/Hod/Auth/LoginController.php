<?php

namespace App\Http\Controllers\Hod\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect('/hod/dashboard');
        } else {
            return view('hod.auth.login');
        }

    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string',
        ],[
           'email.required' => 'Email Id is required',
           'password.required' => 'Password is required',
          ]);

        $credentials = $request->only('email', 'password');
        // $remember_me = $request->has('remember_token') ? true : false;

        if (Auth::attempt($credentials)) {
            // $user = auth()->user();
            // return $user;
            return redirect()->intended('/hod/dashboard')->with('message', 'You are login Successfully.');
        }
        else{
            return redirect('/hod/login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);
        }

    }

    public function hodlogout() {
        Session::flush();
        Auth::logout();

        return redirect('/hod/login')->with('message', 'You are logout Successfully.');
    }
}
