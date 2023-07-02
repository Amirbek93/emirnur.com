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
}
