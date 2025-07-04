{{-- header content --}}
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce Shop</title>

    <!-- Google Font -->
    <link
        href="{{ url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap') }}"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('landing_page/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/style.css') }}" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    {{-- Loading icon above --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href= "#">Sign in</a>
            </div>

        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ url('img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ url('img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ url('img/icon/heart.png') }}" alt=""> <span>0</span></a>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a id="signInbtn" href='{{ route('front.login') }}'>Sign in</a>
                                <a id="toHide" style="display: none;" href='{{ route('front.logout') }}'>Sign
                                    Out</a>
                                <a id="dashboardHide" style="display: none;" href='{{ route('front.dashboard') }}'>Go
                                    to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <span id="alert_msg" class="mx-6 mb-2 text-success">
            @include('component.global-message')
        </span> --}}
        <div class="container">
            <div class="row align-item-center ">
                <div class="col-lg-3 col-md-3 d-flex align-item-center">
                    <div class="header__logo">
                        <a href="{{ route('landing.page') }}"><img src="{{ url('landing_page/img/logo.png') }}"
                                alt="" style="height: 47px; width:190px"></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ request()->routeIs('landing.page') ? 'active' : '' }}"><a
                                    href="{{ route('landing.page') }}">Home</a></li>
                            <li class="{{ request()->routeIs('shop.page') ? 'active' : '' }}"><a
                                    href="{{ route('shop.page') }}">Shop</a></li>
                            <li><a href="{{ route('shop.cart') }}">Shopping Cart</a></li>
                            <li class="{{ request()->routeIs('contact.page') ? 'active' : '' }}"><a
                                    href="{{ route('contact.page') }}">Contacts</a></li>
                                    
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3 d-flex justify-content-end align-items-center">
                    <div class="header__nav__option">
                        <div class="form-group">
                            <form action="{{ route('shop.page') }}">
                                <input type="search" name="search" placeholder="Search any product...." class="form-control search-switch">
                                </input>
                                {{-- <button type="submit" class="form-input"><img src="{{ url('landing_page/img/icon/search.png') }}"
                                alt=""></button> --}}
                            </form>
                        </div>
                        {{-- <a href="#"><img src="{{ url('landing_page/img/icon/heart.png') }}" alt=""></a> --}}

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
{{-- header content ends --}}


@yield('main-container')

@stack('scripts')

{{-- //footer starts here  --}}

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>NewLetter</h6>
                        <div class="footer__newslatter">
                            <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                            <form action="#">
                                <input type="text" placeholder="Your email">
                                <button type="submit"><span class="icon_mail_alt"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>2020
                            All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    {{-- <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            $(document).ready(function(){
                let isLoggedIn = {{ Auth::check() }}
                if(isLoggedIn){
                    $('#signInbtn').hide();
                    $('#toHide').show();
                    $('#dashboardHide').show();
                }
                else{
                    $('#toHide').hide();
                }
            });
        </script>
    
    <script src="{{ asset('landing_page/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/jquery.nicescroll.min.js') }}"></script>

    <script src="{{ asset('landing_page/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('landing_page/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing_page/js/main.js') }}"></script>
    </body>

    </html>
{{-- footer ends --}}