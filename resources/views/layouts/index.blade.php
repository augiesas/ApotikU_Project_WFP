<!DOCTYPE html>
<html lang="en">

<head>
  <title>ApotikU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">


  <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

  <div class="site-wrap">
    <!-- START NAVBAR -->
    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="/home" class="js-logo-clone">ApotikU</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="/home">Home</a></li>
                <li><a href="shop">Store</a></li>
                <li class="has-children">
                  <a href="#">Report</a>
                  <ul class="dropdown">
                    <li><a href="topMedicine">Top Medicine</a></li>
                    <li><a href="topCustomer">Top Customer</a></li>
                    
                  </ul>
                </li>
                <li><a href="">Profile</a></li>
                <li><a href="{{route('history')}}">Riwayat Beli</a></li>
                <li class="has-children">
                  <a href="#">User</a>
                  <ul class="dropdown">
                  @if (Auth::check() && Auth::user()->isAdmin())
                    <li><a href="listUser">List User</a></li>
                  @endif
                    <li><a href="editUser">Edit Profile</a></li>
                    
                  </ul>
                </li>
                @if (Auth::check() && Auth::user()->isAdmin())
                <li class="has-children">
                  <a href="#">Admin Control</a>
                  <ul class="dropdown">
                    <li><a href="listUser">Add Medicine</a></li>
                    <li><a href="category">Category</a></li>
                  </ul>
                </li>
                @endif
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="cart" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
            </a>

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            @if (Auth::user())
            <span class="username username-hide-on-mobile">{{ Auth::user()->name}} </span>
            @endif
            </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </a>
           
            
          </div>
        </div>
      </div>


    </div>
    <!--END NAVBAR -->

    <!-- @yield('banner') -->

    <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
            <div class="site-block-cover-content text-center">
              <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
              <h1>Welcome To ApotikU</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      {{-- Start Some Data --}}
      <div class="row">
        @foreach ($data as $li)
        <div class="col-sm-6 col-lg-4 text-center item mb-4"><br>
          <a href="shop-single.html"> <img src="{{asset('medicines_img/'.$li->image)}}" alt="Image" style="width: 200px; height: 200px;"></a>
          <h3 class="text-dark"><a href="shop-single.html">{{$li->generic_name}}</a></h3>
          <p class="price">Rp. {{$li->price}}</p>
        </div>
        @endforeach
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="{{route('shop')}}" class="btn btn-primary px-4 py-3">View All Products</a>
        </div>
      </div>
      {{--END Some Data  --}}



      @yield('content')
    </div>
  </div>
<div>

  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
              with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>

  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>