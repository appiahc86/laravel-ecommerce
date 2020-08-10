@php
use Overtrue\LaravelShoppingCart\Facade as Cart;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>INNOCENT STORE</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

      {{--  Toastr  --}}
    <link rel="stylesheet" href="{{ asset('toastr/build/toastr.css') }}">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body oncontextmenu="return false">
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="tel:+233545492248"><i class="fa fa-phone"></i> +233 54 549 2248</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> innocent@email.com</a></li>
{{--                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>--}}
            </ul>
            <ul class="header-links pull-right">

                @auth
                    @if(Auth::user()->isAdmin())
                        <li><a href="{{ route('admin') }}">ADMIN</a></li>
                        @endif
                @endauth

{{--                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>--}}


            <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         <span class="fa fa-user"></span>   {{ strtoupper(strtolower(Auth::user()->name ))}} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            &nbsp; &nbsp;
                             <a href="" class="dropdown-item" style="color: black;">My Account</a>


                            <br>


                            &nbsp; &nbsp;
                            <a class="dropdown-item " href="{{ route('logout') }}"
                               style="color: black;"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                            </a>



                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest





            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('welcome') }}" class="logo" style="text-decoration: none; color: #f8ffdc">
                            {{--									<img src="./img/logo.png" alt="">--}}
                            <b style="font-size: 2em;">InnoCenT</b>

                        </a>
                    </div>
                </div>
                <!-- /LOGO -->


                @php

                $cats = \App\Category::all()

                @endphp

        <!-- SEARCH BAR -->
        <div class="col-md-6">
            <div class="header-search">
               {!! Form::open(['method'=>'GET','action'=>'SearchController@product_search']) !!}
                    <select class="input-select" name="category" style="max-width: 149px;">
                        <option value="">All Categories</option>

                        @if(count($cats) > 0)

                            @foreach($cats as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach

                        @endif

                    </select>
                    <input class="input" placeholder="Search Product here" type="search" name="search">
                    <button type="submit" class="search-btn">Search</button>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
{{--                        <div>--}}
{{--                            <a href="#">--}}
{{--                                <i class="fa fa-heart-o"></i>--}}
{{--                                <span>Your Wishlist</span>--}}
{{--                                <div class="qty">2</div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{ Cart::countRows() }}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">


                           {{--   Lits all products in cart--}}
                @if(Cart::countRows() > 0)

                    @foreach(Cart::all() as $product)
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $product->product->img1) }}" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="{{ route('show-product', $product->id) }}">{{ $product->name }}</a></h3>
                                <h4 class="product-price"><span class="qty">{{ $product->qty }}x</span>${{ number_format($product->price, 2)}}</h4>
                            </div>
                            <a href="{{ route('cart.delete', $product->rawId()) }}" class="delete"><i class="fa fa-close"></i></a>
                        </div>

                        @endforeach
                @endif
                        {{--   ./Lits all products in cart--}}


                                </div>
                                <div class="cart-summary">
                                    <small>{{ Cart::countRows() }} Item(s) selected</small>
                                    <h5>SUBTOTAL: ${{ number_format(Cart::totalPrice(), 2) }}</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{ route('cart') }}">View Cart</a>
                                    <a href="{{ route('checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
{{--                <li class="active"><a href="#">Home</a></li>--}}
              @php

               $categories = \App\Category::all()->skip(0)->take(5);

                @endphp
                @if(count($categories) > 0)
                @foreach($categories as $category)
                <li><a href="{{ route('search.cat', $category->name) }}">{{ $category->name }}</a></li>
                @endforeach
                @endif

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->


@yield('content')




<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
                        <ul class="footer-links">
{{--                            <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>--}}
                            <li><a href="tel:+233545492248"><i class="fa fa-phone"></i>+233 54 549 2248</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>inocent@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Categories</h3>
                        <ul class="footer-links">
                            <li><a href="#">Hot deals</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
{{--								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Colorlib</a>--}}
								Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                                 <a style="text-decoration: none; font-size: 1.2em; color: white" href="">innocent.com</a> All rights reserved

                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('toastr/toastr.js') }}"></script>

<script>

    $(function () {

        @if(Session::has('success'))
        toastr.success('{{ session('success') }}');

    });

    @endif

</script>

</body>
</html>
