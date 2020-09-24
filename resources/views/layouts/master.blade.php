<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        @livewireStyles

        <script src="{{ asset('js/font-awesome.js') }}" defer></script>


    </head>
  <body>
    <div id="app">
      <div class="">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/dashboard">
                              <div class="myappfont">
                                <div class="">
                                  <img src="{{asset('images/logo/1.png')}}" style="height:28px;" class="">
                                </div>
                                <div class="pl-1">
                                  ProgBolg
                                </div>
                              </div>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/home" :active="request()->routeIs('dashboard')">
                                {{ __('Home') }}
                            </x-jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/home" :active="request()->routeIs('dashboard')">
                                Profile
                            </x-jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/home" :active="request()->routeIs('dashboard')">
                                About Us
                            </x-jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/home" :active="request()->routeIs('dashboard')">
                                Contact
                            </x-jet-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->

                    <ul class="navbar-nav ml-auto flex">
                        <!-- Authentication Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/login" :active="request()->routeIs('login')">
                                Login
                            </x-jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-jet-nav-link href="/register" :active="request()->routeIs('register')">
                                Register
                            </x-jet-nav-link>
                        </div>
                    </ul>

             </div>
            </nav>

            @yield('content')



           <footer class="footer-bottom">
             <div class="footer-copyright text-center py-3">
               <p class="">ProgBolg &copy;</p> all rights reserved 2020
             </div>
           </footer>






      <!-- Scripts -->
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
      <script src="{{ asset('js/jquery-3.5.1.min.js') }}" defer></script>
      <script src="{{ asset('js/popper.min.js') }}" defer></script>

      @livewireScripts


  </body>
</html>
