<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PagesController extends Controller
{
    public function home()
    {
        if(Auth::check()) {
           $users = auth()->user()->following()->pluck('profiles.user_id');
           $posts = Post::whereIn('user_id', $users)->paginate(5);
           return view('index', compact('posts'));
        } else {
          $posts = Post::orderBy('created_at', 'desc')->paginate(5);
          return view('index', compact('posts'));
        }
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
