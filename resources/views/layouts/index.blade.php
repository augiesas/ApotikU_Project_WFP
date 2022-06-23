<!DOCTYPE html>
<html lang="en">

<head>
    <title>ApotekU</title>
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
                            <a href="{{ route('home') }}" class="js-logo-clone">ApotekU</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <li class="has-children">
                                        <a href="#">Admin Control</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('listmedicine') }}">Medicine</a></li>
                                            <li><a href="{{ route('categoryy') }}">Category</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ route('shop') }}">Store</a></li>
                                @endif


                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <li class="has-children">

                                        <a href="#">Report</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('topMedicine') }}">Top Medicine</a></li>
                                            <li><a href="{{ route('topCustomer') }}">Top Customer</a></li>
                                            <li><a href="{{ route('alltrans') }}">All Transaction</a></li>
                                        </ul>
                                    </li>
                                @endif
                                @if (Auth::check())
                                    @if (!Auth::user()->isAdmin())
                                        <li><a href="{{ route('history') }}">Riwayat Beli</a></li>
                                    @endif
                                    <li class="has-children">
                                        <a href="#">User</a>
                                        <ul class="dropdown">
                                            @if (Auth::user()->isAdmin())
                                                <li><a href="{{ route('listUser') }}">List User</a></li>
                                            @endif

                                            <li><a href="{{ url('edituser', Auth::user()->id) }}">Edit Profile</a></li>

                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    @if (Auth::check() && !Auth::user()->isAdmin())
                        <div class="icons">
                            <a href="{{ url('cart') }}" class="icons-btn d-inline-block bag">
                                <span class="icon-shopping-bag"></span>
                            </a>
                    @endif
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                        data-close-others="true">

                        @if (Auth::user())
                            <span class="username username-hide-on-mobile">{{ Auth::user()->name }} </span>
                        @else
                            <span class="username username-hide-on-mobile">LOGIN/REGISTER </span>
                        @endif
                    </a>
                    @if (Auth::check())
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
                    @else
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </div>
                    @endif
                    </a>
                </div>
            </div>
        </div>


    </div>
    <!--END NAVBAR -->
    @yield('content')


    </div>
    <div>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About Us</h3>
                            <p>ApotekU <br> 160419022 - Augie Salvatory A, 160419048 - Golden Wijaya O, 160419063 -
                                Dhikananda Vinita, 160419069 - Nur Fitriana, 160419155 - Eduard Williams T</p>
                        </div>

                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4"></h3>
                        <ul class="list-unstyled">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contact Info</h3>
                            <ul class="list-unstyled">
                                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                                <li class="phone"><a href="">+2 392 3929 210</a></li>
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
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made
                            with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank" class="text-primary">Colorlib</a>
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
    @yield('javascript')

</body>

</html>
