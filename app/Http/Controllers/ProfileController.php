<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Profile Controller start
    public function profile()
    {
        if (Verification::where('user_id', auth()->user()->id)->exists()) {
            if (Verification::where('user_id', auth()->user()->id)->first()->status) {
                $verification_status = true;
            }
            else {
                $verification_status = false;
            }
        } else {
            $verification_status = false;
        }

        return view('layouts.dashboard.profile.index', compact('verification_status'));
    }


    // Profile Photo Upload Method Start
    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . Auth::user()->name . "." . $request->file('profile_photo')->getClientOriginalExtension();

        $img = Image::make($request->file('profile_photo'))->resize(300, 300);
        $img->save(base_path('public/uploads/profile_photo/' . $new_name), 80);
        User::find(auth()->id())->update([
            'profile_photo' => $new_name,
        ]);
        return back();
    }
    // Profile Photo Upload Method end

    // Password Change start
    public function password_change(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required',
        ], [
            'old_password.required' => "Please Insert Old Password",
        ]);

        // Validation to Match password
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(auth()->id())->update([
                "password" => bcrypt($request->password),
            ]);
            return back()->with('update_successful', "Password has been changed successfully");
        } else {
            return back()->with('old_pass_error', "Old password doesn't match");
        }
    }

    // Password Change end

    // Cover Photo Upload Method start

    public function cover_photo_upload(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image',
        ], [
            'cover_photo.required' => "Please Upload Cover Photo"
        ]);

        $new_name = Auth::user()->id . "_cover_photo_" . Auth::user()->name . "." . $request->file('cover_photo')->getClientOriginalExtension();

        $img = Image::make($request->file('cover_photo'))->resize(1600, 451);
        $img->save(base_path('public/uploads/cover_photo/' . $new_name), 80);
        User::find(auth()->id())->update([
            'cover_photo' => $new_name,
        ]);
        return back();
    }

    // Cover Photo Upload Method end

    // Phone Number add start
    public function phone_number_add(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
        ], [
            'phone_number.required' => "Please Insert phone number",
        ]);

        User::find(auth()->id())->update([
            "phone_number" => $request->phone_number,
        ]);
        return back()->with('number_added', 'Your phone number has been added successfully');
    }
    // Phone Number add end

    // Phone number Verfication start
    public function phone_number_verify()
    {
        // echo auth()->user()->phone_number;

        $url = "http://66.45.237.70/api.php";
        $number = auth()->user()->phone_number;
        $random = rand(100000, 999999);
        $text = "Hello, ". auth()->user()->name." Your OTP is ". $random;
        $data = array(
            'username' => "01834833973",
            'password' => "TE47RSDM",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];


        if (Verification::where('user_id', auth()->user()->id)->exists()) {
            Verification::where('user_id', auth()->user()->id)->update([
                "user_id" => auth()->user()->id,
                "phone_number" => $number,
                "code" => $random,
            ]);
        }
        else {
            Verification::insert([
                "user_id" => auth()->user()->id,
                "phone_number" => $number,
                "code" => $random,
                "created_at" => Carbon::now(),
            ]);
        }
        return back()->with('otp_sent', 'Your OTP has been sent through sms');
    }

    // Phone number Verfication end

    // Verificationm code confirmation start
    public function code_confirm(Request $request){

        if ($request->code==Verification::where('user_id', auth()->user()->id)->first()->code) {
            Verification::where('user_id', auth()->user()->id)->update([
                'status' => true,
            ]);
            return back()->with('otp_sent', 'OTP Sent');
        }
        else {
            return back()->with('otp_mismatch', "OTP doesn't match");
            // echo Verification::where('user_id', auth()->user()->id)->first()->code;
            // echo "OTP doesn't match";
        }
    }

    // Verificationm code confirmation end

    // Resend verification code  start
    public function resend_code(Request $request){

        $url = "http://66.45.237.70/api.php";
        $number = auth()->user()->phone_number;
        $random = rand(100000, 999999);
        $text = "Hello, ". auth()->user()->name." Your OTP is ". $random;
        $data = array(
            'username' => "01834833973",
            'password' => "TE47RSDM",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
        // echo $request->code;
        // echo Verification::where('user_id', auth()->user()->id)->first()->code;
        Verification::where('user_id', auth()->user()->id)->update([
            "user_id" => auth()->user()->id,
            "phone_number" => $number,
            "code" => $random,
        ]);
        return back()->with('otp_resent', 'New OTP Sent');
    }

    // Resend verification code  end

    // Profile Controller end
}
