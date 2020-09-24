<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(Request $request, $post)
    {
      $post = Post::findOrFail($post);
      if(Auth::check()) {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        session()->flash('success', 'A comment has posted successfully');
        return redirect()-> route('post.show', compact('post'));
        }
        else {
          session()->flash('error', 'Unauthorized user');
          return redirect()-> route('login');
        }
    }
}
