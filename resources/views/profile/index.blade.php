<x-app-layout>
  @section('content')
  <div class="container">

      <div class="flex">
        <div class="col-3 p-5">
          <img src="{{$user->profile->proImage()}}" class="rounded-circle w-100" style="height:150px;">
        </div>

        <div class="col-9 pt-5 pb-5 pl-5">
          <div class="flex justify-content-between align-items-baseline">
            <div class="flex align-items-center mb-4">
              <div class="h3">{{$user->username}}</div>
              <follow-button user-id = "{{$user->id}}" follows-id = {{$follows}}>
              </follow-Button>

            </div>
          @can('view', $user->profile)
             <a href="{{route('post.create')}}" class="btn btn-success ml-2">Add new post</a>
          @endcan

          </div>

          @can('view', $user->profile)
           <a href="{{route('profile.edit', $user->username)}}">Edit Profile</a>
          @endcan

          <div class="d-flex">
            <div class="pr-4"><strong>{{$user->posts->count()}}</strong> posts</div>
            <div class="pr-4"><strong>{{$user->profile->follower->count()}}</strong> followers</div>
            <div class="pr-4"><strong>{{$user->following->count()}}</strong> following</div>
          </div>


          <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
          <div>{{$user->profile->description}}</div>
        </div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($user->posts as $post)
            <hr>
             <div class="post-preview">
              <a href="{{route('post.show', $post->id)}}">
              <h2 class="post-title">
              {{$post->title}}
             </h2>
            </a>
           <p class="post-meta">Posted by
            <a href="#">{{$post->user->username}}</a>
            on {{$post->created_at->format('d M Y')}}</p>
         </div>
         <hr>
         @endforeach
         </div>
        </div>
       </div>
      </div>

      </div>

  @endsection('content')
</x-app-layout>
