<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerregistration(Request $request){
        // return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',

        ]);
        User::insert([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "password"=> bcrypt($request->password),
            "created_at"=> Carbon::now(),
            "role"=> 'customer',
        ]);
        return back()->with('registration_success', 'You are registered as a customer');
    }
    public function customerlogin(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
        }
        else {
            return back()->with('login_error', 'You are not registered as a customer');
        }
    }

}
