@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row mt-5">
   <div class="col-8">
     <h1>{{$post->title}}</h1>
   </div>
   <div class="col-4">
     <div class="">
       <div class="d-flex align-items-center">
         <div class="">
           <img src="{{ asset('images/profiles/' .$post->user->profile->image) }}" class="rounded-circle w-100" style="max-width: 40px;">
         </div>
         <div class="pl-2">
           <div>
           </div> <a href="{{route('profile.index', $post->user->username)}}"><span class="text-dark"><strong>{{$post->user->username}}</strong></span></a>
         </div>
         <div class="pl-2">
           <follow-button user-id = "{{$post->user->id}}" follows-id = {{$follows}}>
           </follow-Button>
         </div>
       </div>
     </div>
   </div>
 </div>

   <div class="row mt-3">
     <img src="{{asset('images/posts/' . $post->image)}}" alt="" class="w-100">
   </div>

   <div class="align-items-baseline">
     <div class="row mt-5">
       <div class="col-8">
         <span><h4>{{$post->subtitle}}</h4></span>
       </div>
       <div class="col-4">
         @can('update', $post)
         <div class="btn-group">
           <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit Post</a>
           <a href="{{route('post.delete', $post->id)}}" class="btn btn-danger">Delete post</a>


         </div>
         @endcan
       </div>
     </div>
   </div>

   <hr>

  <div class="row mt-3 pl-3">
    <h6>{{$post->body}}</h6>
  </div>

  <hr>

  <div class="row mt-3 pl-3">
    <h3>Comments</h3>
    <form action="{{route('comment.store', $post->id)}}" method="post">
      @csrf
      <div class="mt-4">
          <textarea name="body" rows="8" cols="80" class="block mt-1 w-full" id="comment"></textarea>
      </div>
      <div class="flex items-center justify-end mt-4">

          <x-jet-button class="ml-4">
              Comment now
          </x-jet-button>
      </div>
    </form>
  </div>

 @foreach($comments as $comment)
  <div class="row mt-3 pl-3">
    <div class="flex align-items-center">
      <div class="">
        <img src="{{ $comment->user->profile->proImage() }}" class="rounded-circle w-100" style="max-width: 40px;">
      </div>
      <div class="align-items-baseline flex">
        <div class="pl-2">
          <div>
          </div> <a href="{{route('profile.index', $comment->post->user_id)}}"><span class="text-dark"><strong>{{$comment->user->username}}:</strong></span></a>
        </div>
        <div class="pl-2">

          <h6>{{$comment->body}}</h6>

        </div>
      </div>
    </div>
  </div>
  <div class="pl-5">

    <p>Posted at :{{ $comment->created_at->format('d M Y') }}</p>
    <hr>
  </div>

   @endforeach


</div>
@endsection
