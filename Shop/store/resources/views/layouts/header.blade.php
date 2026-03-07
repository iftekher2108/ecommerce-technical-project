<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', $setting['seo.meta_title'])</title>

    {{-- Default SEO Meta --}}

    <meta name="description" content="@yield('meta_description', $setting['seo.meta_description'])">
    <meta name="keywords" content="@yield('meta_keywords', $setting['seo.meta_keywords'])">

    <meta name="author" content="Your Company Name">
    <meta name="robots" content="index, follow">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('meta_title', $setting['seo.meta_title'])">
    <meta property="og:description" content="@yield('meta_description', $setting['seo.meta_description'])">
    <meta property="og:image" content="@yield('meta_image', asset('storage/' . $setting['seo.og_image']))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', $setting['seo.meta_title'])">
    <meta name="twitter:description" content="@yield('meta_description', $setting['seo.meta_description'])">
    <meta name="twitter:image" content="@yield('meta_image', asset('storage/' . $setting['seo.og_image']))">

    <link rel="shortcut icon" href="{{ asset('storage/' . $setting['site.favicon']) }}" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: {{ $setting['theme.primary_color'] }};
            /* --primary-color: #dd2222; */
            --title-color: {{ $setting['theme.title_color'] }};
            --p-color: {{ $setting['theme.text_color'] }};
            --text-color: #f1f1f1;
            --bg-color: {{ $setting['theme.bg_color'] }};

            --header-bg-color: {{ $setting['theme.header_bg_color'] }};
            --header-text-color: {{ $setting['theme.header_text_color'] }};

            --footer-title-color: {{ $setting['theme.footer_title_color'] }};
            --footer-bg-color: {{ $setting['theme.footer_bg_color'] }};
            --footer-text-color: {{ $setting['theme.footer_text_color'] }};
        }
    </style>

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/plugin/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">

    @stack('style')

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('home.index') }}">
                <img src="{{ asset('storage/' . $setting['site.logo']) }}" alt="{{ $setting['site.logo'] }}">
            </a>
        </div>
        {{-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> --}}
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div> --}}
            <div class="header__top__right__auth">
                <a href="{{ route('home.login') }}"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="@if (Request::routeIs('home.index')) active @endif"><a href="{{ route('home.shop') }}">Home</a>
                </li>
                <li class="@if (Request::routeIs('home.shop')) active @endif"><a href="{{ route('home.shop') }}">Shop</a>
                </li>
                {{-- <li>
                    <a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.php">Shop Details</a></li>
                        <li><a href="./shoping-cart.php">Shoping Cart</a></li>
                        <li><a href="./checkout.php">Check Out</a></li>
                        <li><a href="./blog-details.php">Blog Details</a></li>
                    </ul>
                </li> --}}
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            @foreach ($setting['site.social'] as $social)
                <a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
            @endforeach
            {{-- <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $setting['contact.email'] }}</li>
                {{-- <li>Free Shipping for all Order of $99</li> --}}
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header" style="background: var(--header-bg-color);">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i style="color: var(--header-text-color);" class="fa fa-envelope"></i>
                                    {{ $setting['contact.email'] }}</li>
                                {{-- <li>Free Shipping for all Order of $99</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                @foreach ($setting['site.social'] as $social)
                                    <a href="{{ $social->link }}"><i style="color: var(--header-text-color);"
                                            class="{{ $social->icon }}"></i></a>
                                @endforeach
                                {{-- <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                            </div>
                            {{-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> --}}
                            <div class="header__top__right__auth">
                                <div class="d-flex" style="gap:4px; align-items:center;">
                                    <i class="fa fa-user" style="color: var(--header-text-color);"></i>
                                    @if (Auth::user())
                                        <a href="{{ route('user.profile') }}">Profile</a>
                                        {{-- | <form action="{{ route('user.logout') }}" method="post">
                                            @csrf
                                            <button class="p-0 border-0">Login Out</button>
                                        </form> --}}
                                    @else
                                        <a href="{{ route('home.login') }}"> Login</a> |
                                        <a href="{{ route('home.register') }}">Register</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="background: var(--header-bg-color);">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('home.index') }}"><img
                                src="{{ asset('storage/' . $setting['site.logo']) }}"
                                alt="{{ $setting['site.title'] }}"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="@if (Request::routeIs('home.index')) active @endif"><a
                                    href="{{ route('home.index') }}">Home</a></li>
                            <li class="@if (Request::routeIs('home.shop')) active @endif"><a
                                    href="{{ route('home.shop') }}">Shop</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.php">Shop Details</a></li>
                                    <li><a href="./shoping-cart.php">Shoping Cart</a></li>
                                    <li><a href="./checkout.php">Check Out</a></li>
                                    <li><a href="./blog-details.php">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="{{ route('profile.wishlist') }}"><i class="fa fa-heart"></i>
                                    @auth
                                        <span>1</span>
                                    @endauth
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('profile.cart') }}"><i class="fa fa-shopping-bag"></i>
                                    @auth
                                        <span>3</span>
                                    @endauth
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    <section class="hero hero-normal" style="background: var(--header-bg-color);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                {{-- <select name="" class="form-select" id="">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone d-md-block d-none">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{ $setting['contact.phone'] }}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
