<x-app-layout>
    @section('header')
     <div class="mt-1">
       @include('partials.header')
     </div>
    @endsection

    @section('content')
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              @foreach($posts as $post)
               <div class="post-preview">
                <a href="{{route('post.show', $post->id)}}">
                <h2 class="post-title">
                {{$post->title}}
               </h2>
              </a>
             <p class="post-meta">Posted by
              <a href="{{route('profile.index', $post->user->username)}}">{{$post->user->username}}</a>
              on {{$post->created_at->format('d M Y')}}</p>
           </div>
           <hr>
           @endforeach
           </div>
          </div>
         </div>
         <div class="mt-5 pl-5 pr-5">
           {{$posts->links()}}
         </div>
    @endsection
</x-app-layout>
