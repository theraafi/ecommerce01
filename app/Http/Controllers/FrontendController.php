<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index',[
            'categories' => Category::all(),
        ]);
    }
    public function about(){
        return view('frontend.about');
    }
public function contact(){
        return view('frontend.contact');
    }
public function account(){
        return view('frontend.account');
    }

}
