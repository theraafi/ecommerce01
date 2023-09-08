<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    // Profile Controller start
    public function profile()
    {
        return view('layouts.dashboard.profile.index');
    }

    // Profile Photo Upload Method Start
    public function profile_photo_upload (Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . Auth::user()->name . "." . $request->file('profile_photo')->getClientOriginalExtension();

        $img =Image::make($request->file('profile_photo'))->resize(300, 300);
        $img->save(base_path('public/uploads/profile_photo/' . $new_name), );
        User::find(auth()->id())->update([
            'profile_photo' => $new_name,
        ]);
        return back();
    }
    // Profile Photo Upload Method end

    // Password Change start
    public function password_change (Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // echo bcrypt($request->old_password);
        Hash::check($request->old_password, Auth::user()->password);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            echo 'Matched';
        }
        else {
            echo 'Not Matched';
        }
    }

    // Password Change end

    // Profile Controller end
}
