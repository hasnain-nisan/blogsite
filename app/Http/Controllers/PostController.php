<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use File;
use Image;

class PostController extends Controller
{

    public function create()
    {
      return view('post.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'subtitle' => 'required',
        'body' => 'required',
        'image' => 'image|required',
      ]);

      if(Auth::check()) {
          $post = new Post;
          $post->title = $request->title;
          $post->subtitle = $request->subtitle;
          $post->body = $request->body;
          $post->user_id =  Auth::user()->id;

          if (!is_null($request->image))
           $image = $request->file('image');
           $img = rand(). '.' .$image->getClientOriginalExtension();
           $location = public_path('images/posts/' .$img);
           Image::make($image)->save($location);
           $post->image = $img;

          $post->save();

          session()->flash('success', 'A new post has been created successfully');
          return redirect()-> route('profile.index', Auth::user()->id);
      }   else {
           session()->flash('error', 'Unauthorized User');
           return back();
      }

    }

    public function show($post)
    {
      $post = Post::findOrFail($post);
      $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->profile) : false;
      $comments = Comment::orderBy('created_at', 'desc')->where('post_id', $post->id)->get();
      return view ('post.show', compact('post', 'comments', 'follows'));
    }

    public function edit($post)
    {
      $post = Post::findOrFail($post);
      return view ('post.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
      $this->validate($request, [
        'title' => 'required',
        'subtitle' => 'required',
        'body' => 'required',
        'image' => 'image|required',
      ]);

      if(Auth::check()) {
         $post = Post::findOrFail($post);
          $post->title = $request->title;
          $post->subtitle = $request->subtitle;
          $post->body = $request->body;
          $post->user_id =  Auth::user()->id;

          if (!is_null($request->image)) {
            //deleting older images
            if (File::exists('images/posts/' .$post->image)){
              File::delete('images/posts/' .$post->image);
            }

            $image = $request->file('image');
            $img = rand(). '.' .$image->getClientOriginalExtension();
            $location = public_path('images/posts/' .$img);
            Image::make($image)->save($location);
            $post->image = $img;

           $post->save();

           session()->flash('success', 'Post has been updated successfully');
           return redirect()-> route('profile.index', Auth::user()->id);
          }

         else {
           session()->flash('error', 'Unauthorized User');
           return back();
      }

    }
}

  public function delete($post)
  {
    if(Auth::check()) {
      $post = Post::findOrFail($post);
      $post->delete();
      session()->flash('success', 'Post has been deleted successfully');
      return redirect()-> route('profile.index', Auth::user()->id);
    }
    else {
      session()->flash('error', 'Unauthorized User');
      return back();
    }
  }
}
