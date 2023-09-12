<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\User;
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
        return view('layouts.dashboard.profile.index');
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

        return back();
    }

    // Phone number Verfication end

    // Profile Controller end
}
