@php
    // pr($settings->general);
    $logo = $settings->getFirstMediaUrl('logo') ?: asset('frontend/images/logo/logo-01.svg');
@endphp

<!-- start header area -->
<div class="header-slider-banner">
    <div class="rts-header-area header-inner-one header--sticky">
        <div class="container-header">
            <div class="row align-items-center ptb_sm--20 padding-controler-header">
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 ">
                    <div class="header-left">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{$logo}}" alt="NFT_image">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 d-xl-block d-none">
                    <div class="main-menu-wrapepr">
                        <nav class="mainmenu-nav d-none d-xl-block">
                            <ul class="main-menu text-right">
                                {{-- @foreach ($dataset as $item) --}}
                                @include('frontend.partials.main-menu', ['device' => NULL])
                                {{-- @endforeach --}}
                                {{-- <li class="single-items">
                                    <a class="navmain" href="#">Home</a>
                                    <ul class="submenu">
                                        <li class="single"><a href="index.html">Home page - 01 <i class="feather-home"></i></a></li>
                                        <li class="single"><a href="index-two.html">Home page - 02<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="index-three.html">Home page - 03<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="index-four.html">Home page - 04<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="index-five.html">Home page - 05<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="index-six.html">Home page - 06<i class="feather-home"></i></a></li>
                                    </ul>
                                </li>
                                <li class="single-items">
                                    <a class="navmain" href="#">Pages</a>
                                    <ul class="submenu mega-menu pages">
                                        <li class="mega-menu-1">
                                            <ul class="mega-1">
                                                <li><a href="about.html">About Page<i class="feather-home"></i></a></li>
                                                <li><a href="team.html">Our Team<i class="feather-home"></i></a></li>
                                                <li><a href="team-single.html">Our Team Details<i class="feather-home"></i></a></li>
                                                <li><a href="error.html">Error 404<i class="feather-home"></i></a></li>
                                                <li><a href="ranking.html">Ranking Page<i class="feather-home"></i></a></li>
                                                <li><a href="collectors.html">Collectors<i class="feather-home"></i></a></li>
                                            </ul>
                                            <ul class="mega-1">
                                                <li><a href="wallet.html">Wallet<i class="feather-home"></i></a></li>
                                                <li><a href="create.html">Create Page<i class="feather-home"></i></a></li>
                                                <li><a href="login.html">Login Page<i class="feather-home"></i></a></li>
                                                <li><a href="registration.html">Registration Page<i class="feather-home"></i></a></li>
                                                <li><a href="activity.html">Activity<i class="feather-home"></i></a></li>
                                                <li><a href="author.html">Author<i class="feather-home"></i></a></li>
                                            </ul>
                                            <ul class="mega-1">
                                                <li><a href="shop.html">Shop Page<i class="feather-home"></i></a></li>
                                                <li><a href="shop-single.html">Shop Details<i class="feather-home"></i></a></li>
                                                <li><a href="cart.html">Cart Page<i class="feather-home"></i></a></li>
                                                <li><a href="check-out.html">Check Out<i class="feather-home"></i></a></li>
                                                <li><a href="faq.html">FAQ Page<i class="feather-home"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="single-items">
                                    <a class="navmain" href="#">Explore</a>
                                    <ul class="submenu explore">
                                        <li class="single"><a href="explore-one.html">Explore One<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="explore-two.html">Explore Two<i class="feather-home"></i></a></li>
                                        <li class="single"><a href="explore-single.html">Explore Single<i class="feather-home"></i></a></li>
                                    </ul>
                                </li>
                                <li class="single-items">
                                    <a class="navmain" href="#">Blog</a>
                                    <ul class="submenu blog">
                                        <li class="single"> <a href="blog.html">Our Blog</a></li>
                                        <li class="single"> <a href="blog-single.html">Blog single</a></li>
                                    </ul>
                                </li>
                                <li class="single-items off-arrow"><a class="single" href="contact.html">Contact</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-8 col-sm-12 justify-content-sm-center d-xsm-flex justify-content-sm-center d-xsm-flex">
                    <div class="header-right">
                        <div class="input-group d-none d-lg-block">
                            <i class="fal fa-search"></i>
                            <input type="text" placeholder="Search Collections">
                        </div>
                        {{-- <div class="setting-option rts-icon-list d-block d-lg-none">
                            <div class="icon-box search-mobile-icon">
                                <button><i class="far fa-search"></i></button>
                            </div>
                            <form id="header-search-1" action="#" method="GET" class="large-mobile-blog-search">
                                <div class="rts-search-mobile form-group">
                                    <button type="submit" class="search-button"><i class="far fa-search"></i></button>
                                    <input type="text" placeholder="Search ...">
                                </div>
                            </form>
                        </div> --}}
                        <ul class="icons">
                            @if(auth()->user())
                                <li class="single-items icon user"> <a  class="navmain" href="{{route('profile.show')}}"><i class="far fa-user"></i></a>
                                </li>
                            @else
                                <li class="icon user"> <a href="{{route('login')}}">Login</a></li>
                                <li class="icon user"> <a href="{{route('register')}}">Register</a></li>
                            @endif
                            {{-- <li class="icon cart-icon-header"> <a href="cart.html"><i class="far fa-shopping-bag"></i></a></li> --}}
                        </ul>
                        {{-- <a id="connect-wallet" href="wallet.html" class="rts-btn btn-primary">Connect Wallet</a> --}}
                        <div class="mobile-menu-bar d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button">
                                    <i class="fal fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ENd Header Area -->

    <!-- start Mobile menue -->


    <!-- mobile menu start -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo logo-custom-css">
                    <a href="index.html"><img src="assets/images/logo/logo-01.svg" alt="_logo"></a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- nav style Start -->
            <nav>
                <ul class="main-menu">

                    @include('frontend.partials.main-menu', ['device' => 'mobile'])
                    {{-- <li class="single-items rts-dropdown">
                        <a class="navmain" href="#">Home</a>
                        <ul class="submenu">
                            <li class="single"><a href="index.html">Home page - 01 <i class="feather-home"></i></a></li>
                            <li class="single"><a href="index-two.html">Home page - 02<i class="feather-home"></i></a></li>
                            <li class="single"><a href="index-three.html">Home page - 03<i class="feather-home"></i></a></li>
                            <li class="single"><a href="index-four.html">Home page - 04<i class="feather-home"></i></a></li>
                            <li class="single"><a href="index-five.html">Home page - 05<i class="feather-home"></i></a></li>
                            <li class="single"><a href="index-six.html">Home page - 06<i class="feather-home"></i></a></li>
                        </ul>
                    </li>
                    <li class="single-items rts-dropdown">
                        <a class="navmain" href="#">Pages</a>
                        <ul class="submenu pages">
                            <li><a href="about.html">About Page<i class="feather-home"></i></a></li>
                            <li><a href="team.html">Our Team<i class="feather-home"></i></a></li>
                            <li><a href="team-single.html">Our Team Details<i class="feather-home"></i></a></li>
                            <li><a href="error.html">Error 404<i class="feather-home"></i></a></li>
                            <li><a href="cart.html">Cart Page<i class="feather-home"></i></a></li>
                            <li><a href="ranking.html">Ranking Page<i class="feather-home"></i></a></li>
                            <li><a href="wallet.html">Wallet<i class="feather-home"></i></a></li>
                            <li><a href="create.html">Create Page<i class="feather-home"></i></a></li>
                            <li><a href="login.html">Login Page<i class="feather-home"></i></a></li>
                            <li><a href="registration.html">Registration Page<i class="feather-home"></i></a></li>
                            <li><a href="check-out.html">Check Out<i class="feather-home"></i></a></li>
                            <li><a href="activity.html">Activity<i class="feather-home"></i></a></li>
                            <li><a href="contact.html">Contact Us<i class="feather-home"></i></a></li>
                            <li><a href="shop.html">Shop Page<i class="feather-home"></i></a></li>
                            <li><a href="shop-single.html">Shop Details<i class="feather-home"></i></a></li>
                            <li><a href="collectors.html">Collectors<i class="feather-home"></i></a></li>
                            <li><a href="author.html">Author<i class="feather-home"></i></a></li>
                        </ul>
                    </li>
                    <li class="single-items rts-dropdown">
                        <a class="navmain" href="#">Explore</a>
                        <ul class="submenu explore">
                            <li class="single"><a href="explore-one.html">Explore One<i class="feather-home"></i></a></li>
                            <li class="single"><a href="explore-two.html">Explore Two<i class="feather-home"></i></a></li>
                        </ul>
                    </li>
                    <li class="single-items rts-dropdown">
                        <a class="navmain" href="#">Blog</a>
                        <ul class="submenu blog">
                            <li class="single"> <a href="blog.html">Our Blog</a></li>
                            <li class="single"> <a href="blog-single.html">Blog single</a></li>
                        </ul>
                    </li>
                    <li class="single-items off-arrow"><a class="navmain" href="contact.html">Contact</a></li> --}}
                </ul>
            </nav>
            <!-- nav style hear End -->
        </div>
    </div>
    <!-- mobile menu end -->
    <!-- end mobile menue -->
    @if(!empty($sliders) && count($sliders) > 0)
    <div class="rts-banner-area banner-four-area banner-one rt_bg-secondary rts-section-gapBottom pt--100 pt_md--60 pt_sm--50 bg_tr-image--1" style="height: 850px;">
        <div class="container parallaxSwiper swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                @foreach ($sliders as $slider)

                <div class="swiper-slide row row-reverce-sm pt--150">
                    <div class="col-lg-7 order-lg-1 order-md-2 order-sm-2">
                        <div class="banner-one-left-inner">
                            <h1 class="title" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">
                                {{$slider['name']}}
                            </h1>
                            {!! $slider['content'] !!}
                            {{-- <p class="disc" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">
                                Quickly aggregate global systems before emerg model. Profession disintermedia corporate
                                deliverab.
                            </p>
                            <a href="shop.html" class="rts-btn btn-primary btn-lg radious-5" data-sal-delay="600" data-sal-duration="1000" data-sal="slide-up">Get Started</a> --}}
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-md-1 order-sm-1">
                        <div class="thumbnail-one thum-four">
                            <img src="{{ $slider->getFirstMediaUrl('image') ?: 'assets/images/banner/banner-02.png'}}" alt="{{$slider['name']}}">
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Slide 2 -->
                {{-- <div class="swiper-slide row row-reverce-sm pt--150">
                    <div class="col-lg-7 order-lg-1 order-md-2 order-sm-2">
                        <div class="banner-one-left-inner">
                            <h1 class="title" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">
                                Sell Your Real Nfts & Earn WEth to Business.
                            </h1>
                            <p class="disc" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">
                                Quickly aggregate global systems before emerg model. Profession disintermedia corporate
                                deliverab.
                            </p>
                            <a href="shop.html" class="rts-btn btn-primary btn-lg radious-5" data-sal-delay="600" data-sal-duration="1000" data-sal="slide-up">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-md-1 order-sm-1">
                        <div class="thumbnail-one thum-four">
                            <img src="assets/images/banner/banner-02.png" alt="Nft-banner">
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Swiper Pagination and Navigation Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    @endif
</div>
    <!-- banner area start -->
