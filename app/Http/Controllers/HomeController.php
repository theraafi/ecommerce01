<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
    public function home()
    {
        if (auth()->user()->role == 'customer') {
            return view('frontend.customer_dashboard');
        } else {
            return view('home');
        }
    }

    public function users()
    {
        $users = User::all();
        return view('layouts.dashboard.users', compact('users'));
    }

    public function adduser(Request $request)
    {
        $request->validate([
            'admin_name' => 'required',
            'email' => 'unique:users,email'
        ]);

        User::insert([
            'name' => $request->admin_name,
            'email' => $request->email,
            'password' => Str::random(8),
            'created_at' => Carbon::now(),
            'role' => 'admin',
        ]);
        return back();
    }
}
