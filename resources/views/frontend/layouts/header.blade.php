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

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('landing_page/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('landing_page/css/style.css') }}" type="text/css">

   
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                                <a id="toHide" style="display: none;" href='{{ route('front.logout') }}'>Sign Out</a>
                                <a id="dashboardHide" style="display: none;" href='{{ route('front.dashboard') }}'>Go to Dashboard</a>
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
                                alt=""></a>
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
                        <a href="#" class="search-switch"><img
                                src="{{ url('landing_page/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ url('landing_page/img/icon/heart.png') }}" alt=""></a>

                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
