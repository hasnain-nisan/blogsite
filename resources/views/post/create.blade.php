@extends('layouts.app')

@section('content')

<div class="container">
  <div class="mt-3">
    <x-jet-authentication-card >
        <x-slot name="logo">

              <img src="{{asset('images/logo/1.png')}}" alt="" style="max-height: 100px;">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="">
                <x-jet-label value="Title" />
                <x-jet-input class="block mt-1 w-full" type="text" name="title" value="" />
            </div>

            <div class="mt-4">
                <x-jet-label value="Sub-title" />
                <x-jet-input class="block mt-1 w-full" type="text" name="subtitle" value="" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="body" />
                <textarea name="body" rows="8" cols="80" class="block mt-1 w-full"></textarea>
            </div>

            <div class="mt-4">
                <x-jet-label value="Image" />
                <x-jet-input class="block mt-1 w-full" type="file" name="image" value="" required  />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    Create now
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
  </div>
</div>



@endsection
