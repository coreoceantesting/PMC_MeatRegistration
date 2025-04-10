<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\MeatRegisteredUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function User_Register_Form()
    {
        return view('user.auth.register');
    }

    public function Store_User_Register_Form(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:meatregistered_users,email,{$this->user->id},id,deleted_dt,NULL|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'mobile' => 'required|string|min:10|max:12',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required' => ' MeatUsername is required',
            'email.required' => 'Email Id is required',
            'mobile.required' => ' mobile is required',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm Password is required',
        ]);

        $data = new MeatRegisteredUser();

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->mobile = $request->get('mobile');
        $data->password = Hash::make($request->get('password'));
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->save();

        $update = [
            'inserted_by' => $data->id,
        ];

        MeatRegisteredUser::where('id', $data->id)->update($update);

        return redirect('/user/login')->with('message', 'You are Register Successfully.');
    }
}
