<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('layouts.dashboard.profile.index');
    }
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

}
