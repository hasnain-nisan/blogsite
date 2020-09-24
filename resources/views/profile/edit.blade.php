<x-app-layout>
@section('content')
 <div class="container">
   <div class="mt-3">
     <x-jet-authentication-card >
         <x-slot name="logo">

               <img src="{{asset('images/logo/1.png')}}" alt="" style="max-height: 100px;">

         </x-slot>

         <x-jet-validation-errors class="mb-4" />

         <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
             @csrf

             <div class="">
                 <x-jet-label value="Username" />
                 <x-jet-input class="block mt-1 w-full" type="text" name="username" value="{{$user->username}}" />
             </div>

             <div class="mt-4">
                 <x-jet-label value="First name" />
                 <x-jet-input class="block mt-1 w-full" type="text" name="first_name" value="{{$user->profile->first_name}}" required />
             </div>

             <div class="mt-4">
                 <x-jet-label value="Last name" />
                 <x-jet-input class="block mt-1 w-full" type="text" name="last_name" value="{{$user->profile->last_name}}" required />
             </div>

             <div class="mt-4">
                 <x-jet-label value="Title" />
                 <x-jet-input class="block mt-1 w-full" type="text" name="title" value="{{$user->profile->title}}" required  />
             </div>

             <div class="mt-4">
                 <x-jet-label value="Description" />
                 <x-jet-input class="block mt-1 w-full" type="text" name="description" value="{{$user->profile->description}}" required />
             </div>

             <div class="mt-4">
                 <x-jet-label value="Email" />
                 <x-jet-input class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}"/>
             </div>

             <div class="mt-4">
                 <x-jet-label value="Profile picture" />
                 <a href="{{asset('images/profiles/' . $user->profile->image)}}">User Current profile picture</a>
                 <x-jet-input class="block mt-1 w-full" type="file" name="image" />
             </div>



             <div class="flex items-center justify-end mt-4">

                 <x-jet-button class="ml-4">
                     Update
                 </x-jet-button>
             </div>
         </form>
     </x-jet-authentication-card>
   </div>
 </div>

@endsection
</x-app-layout>
