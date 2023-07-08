<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
    public function post(Request $request){
        return view('blog-post');
    }
    public function blog(Request $request, $id){
        $id = (int) $id;
        $blog = Blog::find($id);
        return view('blog',compact('blog'));
    }
    public function blogs(Request $request){
        $blogs = Blog::paginate(5);
        return view('blogs',compact('blogs'));
    }
}
