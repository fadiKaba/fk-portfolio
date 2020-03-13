<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = Post::orderBy('created_at','desc')->with('user')->paginate(6);
        return view('home')->with(compact('posts'));
    }
    public function search(Request $request){

      $search = Post::where('post_title', 'LIKE', "%$request->str%")->get();
      return $search;
    }
    public function getResult(Request $request){

     $posts = Post::where('post_title', 'LIKE', "%$request->sresult%")->with('user')->get();
     return view('home')->with(compact('posts'));
    }
    public function about(){
        return view('about');
    }
}
