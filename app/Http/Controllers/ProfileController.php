<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use File;
use Image;

class ProfileController extends Controller
{

    public function index($user)
    {
      $user = User::where('username', $user)->first();
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile) : false;
      return view('profile.index', compact('user', 'follows'));
    }

    public function edit($user)
    {
      $user = User::where('username', $user)->first();
      return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {
      $user = User::findOrFail($user);

      $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image' => 'image|required',
      ]);

      if(Auth::check()) {
        $user->profile->first_name = $request->first_name;
        $user->profile->last_name = $request->last_name;
        $user->profile->title = $request->title;
        $user->profile->description = $request->description;
        $user->username = $request->username;
        $user->email = $request->email;

        if (!is_null($request->image)) {
         //deleteing old images
         if (File::exists('images/profiles/' .$user->profile->image)){
           File::delete('images/profiles/' .$user->profile->image);
         }

          $image = $request->file('image');
          $img = rand(). '.' .$image->getClientOriginalExtension();
          $location = public_path('images/profiles/' .$img);
          Image::make($image)->save($location);
          $user->profile->image = $img;
        }

        $user->profile->save();
        $user->save();

        session()->flash('success', 'Your profile has updated successfully');
        return redirect()-> route('profile.index', compact('user'));
      } else {
        session()->flash('error', 'Unauthorized User');
        return back();
      }

    }
}
