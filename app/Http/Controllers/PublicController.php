<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request){
        return view('index');
    }
    public function aboutus(Request $request){
        return view('aboutus');
    }
    public function portfolio(Request $request){
        return view('portfolio');
    }
    public function contact(Request $request){
        return view('contact');
    }
    public function blog(Request $request){
        return view('blog');
    }
    public function post(Request $request){
        return view('blog-post');
    }
}
