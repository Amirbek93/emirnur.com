<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Blogs;
use App\Models\Index;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\Aboutus;
use app\Models\post;
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
        $portfolios = Portfolio::paginate(84);
        return view("portfolio",compact('portfolios'));
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
        $blogs = Blogs::paginate(30);
        return view('blogs',compact('blogs'));
    }
}
