<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    public function customerregistration(Request $request){
        // return $request;
        User::insert([
            "name" => $request->name,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            "password"=> bcrypt($request->password),
            "created_at"=> Carbon::now(),
            "role"=> 'customer',
        ]);
        return back();
    }
}
