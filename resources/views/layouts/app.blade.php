<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
    @yield('title', 'ProgBlog | A programming based blogsite')
    </title>
    @include('partials.styles')

   </head>
  <body>

   <div class="wrapper">
     @include('partials.navbar')
     @include('partials.errormessage')
     @yield('header')
    <div class="mt-2" id="app">
      @yield('content')

      @include('partials.footer')
    </div>
   </div>

    @include('partials.scripts')
  </body>
</html>
