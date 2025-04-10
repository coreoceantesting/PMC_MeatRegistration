<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\MeatRegisteredUser;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function User_Login_Form()
    {
        return view('user.auth.login');

    }

    public function User_Authenticate(Request $request)
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
        
       // echo $credentials ;exit;

        if (auth()->guard('meatregistereduser')->attempt($credentials)) {
            return redirect('/')->with('message', 'You are login successfully.');
            
           
        }
        else{
            // return redirect()->back()->with(['Input' => $request->only('email'), 'error' => 'Your Email and Password do not match our records!']);;
            //   return back()->Input->withErrors(['email' =>'Email or password in invalid']);
        //   return redirect()->back()->withInput($request->only('Username'))->withErrors([
        //         'error' => 'Your Username and Password do not match our records!',
        //     ]);
        
         return redirect('/user/login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);    
             
        }

    }

    public function User_Logout(Request $request) {
        Auth::guard('meatregistereduser')->logout();

        $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/student/login')->with('message', 'You are logout Successfully.');
        return redirect('/')->with('message', 'You are logout Successfully.');
    }
}
