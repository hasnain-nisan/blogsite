<x-app-layout>
    @section('header')
    <div class="mt-1">
      <header class="masthead" style="background-image: url('images/headerImages/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="site-heading">
                <div class="flex text-center pl">
                  <img src="{{asset('images/logo/1.png')}}" alt="" style="max-height: 150px;">
                  <h1 class="myappfont">ProgBlog</h1>
                </div>
                <span class="subheading">About Us</span>
              </div>
            </div>
          </div>
        </div>
      </header>
    </div>
    @endsection

    @section('content')
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
      </div>
    </div>
  </div>


    @endsection
</x-app-layout>
