@extends('frontend.layouts.app')

@push('content')
    @include('frontend.layouts.header')

    <!-- become a creator style two -->
    @if(!empty($categories) && count($categories) > 3)
    <div class="rts-b-creator-area rts-section-gapTop">
        <div class="container">
            <div class="row g-5">
                <!-- single step start -->
                @foreach ($categories as $_c_key => $category)
                @if($_c_key <= 2)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="single-create" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">
                        <div class="wrapper">
                            <div class="thumb-ico">
                                <img src="{{$category->getFirstMediaUrl() ?: 'assets/images/icon/create/04.png'}}" alt="NFT-create-process">
                            </div>
                            <h6 class="title"><a href="{{route('category.index', $category->permalink)}}">{{$category->name}}</a></h6>
                            <P class="disc">{{$category->description}}</P>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <!-- single step start -->
            </div>
        </div>
    </div>
    @endif
    <!-- become a creator style two End -->

    <!-- start about area-->
    <div class="rts-about-area about-style-one rt_bg-secondary bg-solid-secondary  about-bg rts-section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="about-left" data-sal-delay="150" data-sal-duration="800" data-sal="slide-right">
                        <div class="thumbnail">
                            <img src="assets/images/about/about-05.png" alt="Nft_About">
                            <div class="about-badge tranding">
                                <img class="icon" src="assets/images/about/icon/icon-01.png" alt="Nft_about-icon">
                                <p class="tranding">Trending Items</p>
                            </div>
                            <div class="about-badge nft">
                                <p class="user">11,000+ NFTs</p>
                                <!-- those who use  -->
                                <div class="-user">
                                    <img data-tooltip="Jordan" class="user avatar user-1" src="assets/images/about/user-icon/user-01.png" alt="NFT_User">
                                    <img class="user user-2" src="assets/images/about/user-icon/user-02.png" alt="NFT_User">
                                    <img class="user user-3" src="assets/images/about/user-icon/user-03.png" alt="NFT_User">
                                    <img class="user user-4" src="assets/images/about/user-icon/user-04.png" alt="NFT_User">
                                    <img class="user user-5" src="assets/images/about/user-icon/user-05.png" alt="NFT_User">
                                </div>
                                <!-- those who use  -->
                            </div>
                            <div class="about-badge place-bid">
                                <div class="left-placebid">
                                    <h6 class="place-bid">Biars BD</h6>
                                    <span>@alamin bali</span>
                                    <h6 class="doller">$1253.25</h6>
                                </div>
                                <div class="right-place-bid">
                                    <a href="explore-single.html" class="rts-btn btn-primary radious-5">Place Bid</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-inner">
                        <span class="sub-title">About Us</span>
                        <h3 class="title" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">Discover More
                            Collect <br> and Sell Rare NFTs</h3>
                        <p class="disc mb--25 mb_sm--10" data-sal-delay="250" data-sal-duration="800" data-sal="slide-up">Quickly administrate open-source expertise principle-centered catalysts
                            for
                            change. Appropri enhance the efficient models before 24/7 leadership.</p>
                        <p class="disc" data-sal-delay="350" data-sal-duration="800" data-sal="slide-up">Quickly
                            administrate open-source expertise principle-centered catalysts for
                            change. Appropri enhance the efficient models before 24/7 leadership.</p>


                        <a href="about.html" class="rts-btn btn-primary radious-5">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about area-->

    <!-- Top Collectors start -->
    <div class="rts-collectors-area rts-section-gapBottom rt_bg-secondary collectors-bg-shape bg_image">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            Top Collectors
                        </span>
                        <h3 class="title">Top Contributor This Week</h3>
                    </div>
                </div>
            </div>
            <div class="row g-5 mt--50">
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="600" data-sal="slide-up">
                        <div class="thumbnail badge badge-1">
                            <a href="#"><img src="assets/images/collectors/collectors-01.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">McDonald's</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">
                        <div class="thumbnail badge badge-2">
                            <a href="#"><img src="assets/images/collectors/collectors-02.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">A J William</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="1000" data-sal="slide-up">
                        <div class="thumbnail badge badge-3">
                            <a href="#"><img src="assets/images/collectors/collectors-03.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">Lord Barlish</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="1200" data-sal="slide-up">
                        <div class="thumbnail badge badge-4">
                            <a href="#"><img src="assets/images/collectors/collectors-04.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">Donald's</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="1400" data-sal="slide-up">
                        <div class="thumbnail badge badge-5">
                            <a href="#"><img src="assets/images/collectors/collectors-05.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">McDonald's</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="1600" data-sal="slide-up">
                        <div class="thumbnail badge badge-6">
                            <a href="#"><img src="assets/images/collectors/collectors-06.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">nald's</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="1800" data-sal="slide-up">
                        <div class="thumbnail badge badge-7">
                            <a href="#"><img src="assets/images/collectors/collectors-07.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">kabir B</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="2000" data-sal="slide-up">
                        <div class="thumbnail badge badge-8">
                            <a href="#"><img src="assets/images/collectors/collectors-08.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">Soebjr</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
                <!-- start single Top Collectors -->
                <div class="col-xl-4 col-lg-6">
                    <div class="collectors-one-wrapper" data-sal-delay="150" data-sal-duration="2000" data-sal="slide-up">
                        <div class="thumbnail badge badge-9">
                            <a href="#"><img src="assets/images/collectors/collectors-09.png" alt="NFt-Collectors"></a>
                        </div>
                        <div class="details">
                            <a href="#">
                                <h5 class="title">Jone Lee</h5>
                            </a>
                            <span class="collection">147 Collections</span>
                        </div>
                        <div class="option">
                            <i class="far fa-cog"></i>
                        </div>
                    </div>
                </div>
                <!-- start single Top Collectors -->
            </div>
            <div class="row mt--50">
                <div class="col-12 text-center btn-collectors">
                    <a href="#" class="rts-btn btn-secondary radious-5 radious-5 btn-lg">View More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Collectors Ends -->

    <!-- Live tranding items -->
    <div class="live-tranding-area tranding_bg-shape rts-section-gapBottom rt_bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-center">
                        <span class="sub-title">
                            Live Sale
                        </span>
                        <h3 class="title">Live Trending Items</h3>
                    </div>
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-12">
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- single slider -->
                                <div class="trending-items_wrapper">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-01.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Sales25
                                            </h5>
                                            <span class="deg">
                                                @Sailor
                                            </span>
                                            <h5 class="price">$1053.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                            <div class="swiper-slide">
                                <!-- single slider -->
                                <div class="trending-items_wrapper">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-02.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Athestics VR
                                            </h5>
                                            <span class="deg">
                                                @Kolis
                                            </span>
                                            <h5 class="price">$153.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                            <div class="swiper-slide">
                                <!-- single slider -->
                                <div class="trending-items_wrapper">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-03.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Sports VR
                                            </h5>
                                            <span class="deg">
                                                @Bajuban
                                            </span>
                                            <h5 class="price">$103.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                            <div class="swiper-slide">

                                <!-- single slider -->
                                <div class="trending-items_wrapper">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-01.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Metaverse VR
                                            </h5>
                                            <span class="deg">
                                                @Sajid
                                            </span>
                                            <h5 class="price">$253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Live tranding items -->

    <!-- isotop explore style start -->
    <div class="rts-isotop-button-center-area explore-isotop-two explore-isotop-three rts-section-gap">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="title-area text-center un-sub">
                        <span class="sub-title">
                            Categories
                        </span>
                        <h3 class="title animated fadeIn sal-animate" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">Explore NFTs by Categorie</h3>
                    </div>
                    <div class="button-group filters-button-group mt--50">
                        <button class="button sal-animate" data-filter="*" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">All</button>
                        <button class="button sal-animate" data-filter=".city1" data-sal-delay="400" data-sal-duration="800" data-sal="slide-up">Photography</button>
                        <button class="button sal-animate" data-filter=".city2" data-sal-delay="500" data-sal-duration="800" data-sal="slide-up">Sports</button>
                        <button class="button sal-animate" data-filter=".city3" data-sal-delay="600" data-sal-duration="800" data-sal="slide-up">Music</button>
                        <button class="button sal-animate is-checked" data-filter=".city4" data-sal-delay="700" data-sal-duration="800" data-sal="slide-up">Virtual World</button>
                        <!-- <button class="button" data-filter=".city5">3D</button>
                        <button class="button" data-filter=".city6">Asthetics</button> -->
                    </div>
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-lg-12 filter-explore" style="padding: 0px;">
                    <div class="grid" style="position: relative; height: 596.406px;">
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city1" data-category="transition" style="position: absolute; left: 0px; top: 0px; display: none;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper sal-animate" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-01.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Kajib VR
                                            </h5>
                                            <span class="deg">
                                                @sharlie
                                            </span>
                                            <h5 class="price">$1253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>

                        </div>
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city2" data-category="metalloid" style="position: absolute; left: 0px; top: 0px; display: none;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper sal-animate" data-sal-delay="400" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-02.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Sopily VR
                                            </h5>
                                            <span class="deg">
                                                @sharlie
                                            </span>
                                            <h5 class="price">$1253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city3" data-category="post-transition" style="position: absolute; left: 0px; top: 0px; display: none;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper sal-animate" data-sal-delay="500" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-03.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Jibones VR
                                            </h5>
                                            <span class="deg">
                                                @Kapila
                                            </span>
                                            <h5 class="price">$253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city3 city4" data-category="post-transition" style="position: absolute; left: 0px; top: 0px;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper sal-animate" data-sal-delay="600" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-04.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Kumar VR
                                            </h5>
                                            <span class="deg">
                                                @Moral
                                            </span>
                                            <h5 class="price">$53.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city4 city5 city1" data-category="post-transition" style="position: absolute; left: 547.5px; top: 0px;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper sal-animate" data-sal-delay="700" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-05.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                Twest VR
                                            </h5>
                                            <span class="deg">
                                                @Kipal
                                            </span>
                                            <h5 class="price">$1253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                        <div class="element-item col-lg-3 col-md-6 col-sm-6 city5 city3 city6" data-category="metalloid" style="position: absolute; left: 0px; top: 596.406px; display: none;">
                            <div class="explore-wrapper">
                                <!-- single slider -->
                                <div class="trending-items_wrapper" data-sal-delay="800" data-sal-duration="800" data-sal="slide-up">
                                    <div class="thumbnail">
                                        <a href="explore-single.html"><img src="assets/images/product/product-06.png" alt="Nft_product"></a>
                                    </div>
                                    <div class="product-discription">
                                        <div class="product-left">
                                            <h5 class="title">
                                                topic VR
                                            </h5>
                                            <span class="deg">
                                                @balios
                                            </span>
                                            <h5 class="price">$253.25</h5>
                                        </div>
                                        <div class="product-right">
                                            <a href="explore-single.html" class="rts-btn btn-secondary radious-5">Place-Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slider End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt--30">
                <div class="col-12 text-center sal-animate" data-sal-delay="900" data-sal-duration="800" data-sal="slide-up">
                    <a href="shop.html" class="rts-btn btn-secondary radious-5 btn-md">View More Product</a>
                </div>
            </div>
        </div>
    </div>
    <!-- isotop explore style end -->

    <!-- service section start -->
    <div class="rts-service-area rt_bg-secondary mb--30">
        <div class="container">
            <div class="row service-inner align-items-center">
                <!--Left image start-->
                <div class="col-xl-6 col-lg-6">
                    <div class="thumbnail">
                        <img src="assets/images/service/service-01.png" alt="Nft_service_image">
                    </div>
                </div>
                <!--Left image End-->
                <!-- start Service Details area -->
                <div class="col-xl-6 col-lg-6">
                    <div class="title-area service-details text-start">
                        <span class="sub-title">
                            Why Choose Us
                        </span>
                        <h3 class="title" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">Exclusive &
                            Important For Future NFTs</h3>
                        <p class="disc" data-sal-delay="150" data-sal-duration="1000" data-sal="slide-up">
                            Quickly administrate open-source expertise principle-centered catalysts for change. Appropri
                            enhance.
                        </p>
                        <div class="service-sm-inner">
                            <div class="service-sm" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">
                                <i class="fal fa-check"></i>
                                <p>Fully Secure</p>
                            </div>
                            <div class="service-sm" data-sal-delay="150" data-sal-duration="1000" data-sal="slide-left">
                                <i class="fal fa-check"></i>
                                <p>Digital Payment</p>
                            </div>
                            <div class="service-sm" data-sal-delay="150" data-sal-duration="1200" data-sal="slide-up">
                                <i class="fal fa-check"></i>
                                <p>24/7 Support Team</p>
                            </div>
                        </div>
                        <a href="#" class="rts-btn btn-primary btn-lg radious-5 d-block mt--30" data-sal-delay="300" data-sal-duration="1400" data-sal="slide-up">More Details</a>
                    </div>
                </div>
                <!-- start Service Details area -->
            </div>
        </div>
    </div>
    <!-- service section end -->
    <!-- isotop categories style start -->
    <div class="rts-explore-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="title-area text-center un-sub">
                    <span class="sub-title">
                        Categories
                    </span>
                    <h3 class="title animated fadeIn sal-animate" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">Explore NFTs by Categorie</h3>
                </div>
            </div>
            <div class="row mt--50">
                <div class="col-lg-20">
                    <!-- single categories start -->
                    <div class="categori-inner three text-center sal-animate" data-sal-delay="300" data-sal-duration="800" data-sal="slide-up">
                        <img src="assets/images/icon/categories/categorie-12.png" alt="Nft_category-logo">
                        <p class="name">Games</p>
                        <a class="over-link" href="#"></a>
                    </div>
                    <!-- single categories start -->
                </div>
                <div class="col-lg-20">
                    <!-- single categories start -->
                    <div class="categori-inner three text-center sal-animate" data-sal-delay="400" data-sal-duration="800" data-sal="slide-up">
                        <img src="assets/images/icon/categories/categorie-13.png" alt="Nft_category-logo">
                        <p class="name">Illustrations</p>
                        <a class="over-link" href="#"></a>
                    </div>
                    <!-- single categories start -->
                </div>
                <div class="col-lg-20">
                    <!-- single categories start -->
                    <div class="categori-inner three text-center sal-animate" data-sal-delay="500" data-sal-duration="800" data-sal="slide-up">
                        <img src="assets/images/icon/categories/categorie-14.png" alt="Nft_category-logo">
                        <p class="name">Art Work</p>
                        <a class="over-link" href="#"></a>
                    </div>
                    <!-- single categories start -->
                </div>
                <div class="col-lg-20">
                    <!-- single categories start -->
                    <div class="categori-inner three text-center sal-animate" data-sal-delay="600" data-sal-duration="800" data-sal="slide-up">
                        <img src="assets/images/icon/categories/categorie-15.png" alt="Nft_category-logo">
                        <p class="name">3D Work</p>
                        <a class="over-link" href="#"></a>
                    </div>
                    <!-- single categories start -->
                </div>
                <div class="col-lg-20">
                    <!-- single categories start -->
                    <div class="categori-inner three text-center sal-animate" data-sal-delay="700" data-sal-duration="800" data-sal="slide-up">
                        <img src="assets/images/icon/categories/categorie-11.png" alt="Nft_category-logo">
                        <p class="name">Photography</p>
                        <a class="over-link" href="#"></a>
                    </div>
                    <!-- single categories start -->
                </div>
            </div>
        </div>
    </div>
    <!-- isotop categories style end -->
    <!-- start faq section area -->
    <div class="rts-faq-section bg-shape-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="title-area text-left un-sub">
                        <span class="sub-title">
                            Why NFT Important
                        </span>
                        <h3 class="title animated fadeIn">Exclusive &amp; Important <br> For Future NFTs</h3>
                        <p class="disc mt--25 mb--25">Quickly administrate open-source expertise principle-centered catalysts for change. Appropri enhance.</p>
                    </div>
                    <div class="accordion-wrapper">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What Is NFT?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">NFTs are tokens that we can use to represent ownership of unique items. They let us tokenise things like art, collectibles, even real estate. They can only have one official owner at a time and they're secured by the Ethereum blockchain – no one can modify the record of ownership or copy/paste a new NFT into existence..
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Is NFT Futuristic Fund?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">NFTs are tokens that we can use to represent ownership of unique items. They let us tokenise things like art, collectibles, even real estate. They can only have one official owner at a time and they're secured by the Ethereum blockchain – no one can modify the record of ownership or copy/paste a new NFT into existence.w.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Is NFT Secure For General People?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">NFTs are tokens that we can use to represent ownership of unique items. They let us tokenise things like art, collectibles, even real estate. They can only have one official owner at a time and they're secured by the Ethereum blockchain – no one can modify the record of ownership or copy/paste a new NFT into existence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-thumbnail">
                        <img src="assets/images/contact/02.png" alt="Nft_contact">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end faq section area -->

    <!-- start brand area -->
    <div class="rts-brand-area brand-style-one rts-gradient-footerside">
        <div class="container">
            <div class="row">
                <ul class="brand-style-one">
                    <li class="single-brand"><a href="#"><img src="assets/images/logo/brand/brand-01.png" alt="NFT_Brand"></a></li>
                    <li class="single-brand"><a href="#"><img src="assets/images/logo/brand/brand-02.png" alt="NFT_Brand"></a></li>
                    <li class="single-brand"><a href="#"><img src="assets/images/logo/brand/brand-03.png" alt="NFT_Brand"></a></li>
                    <li class="single-brand"><a href="#"><img src="assets/images/logo/brand/brand-04.png" alt="NFT_Brand"></a></li>
                    <li class="single-brand"><a href="#"><img src="assets/images/logo/brand/brand-05.png" alt="NFT_Brand"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End brand area -->

    <!-- start header area -->
    <!-- start Footer area -->
    <div class="rts-footer-area bg-shape-footer pt--120 rt_bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mb_sm--30 ">
                    <div class="footer-left-wrapper">
                        <a href="#"><img src="assets/images/logo/logo-02.svg" alt="Nft_logo" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up"></a>
                        <p class="disc" data-sal-delay="150" data-sal-duration="1000" data-sal="slide-up">Quickly administrate open-source expertise principle-centered catalysts for change. Appropri enhance.</p>
                        <ul class="social-wrapper">
                            <li class="icon" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="icon" data-sal-delay="250" data-sal-duration="1000" data-sal="slide-up"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="icon" data-sal-delay="350" data-sal-duration="1200" data-sal="slide-up"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="icon" data-sal-delay="450" data-sal-duration="1400" data-sal="slide-up"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-single-wized">
                        <h5 class="wized-title" data-sal-delay="150" data-sal-duration="600" data-sal="slide-up">Marketplace</h5>
                        <ul class="wizid-lists">
                            <li class="item" data-sal-delay="250" data-sal-duration="800" data-sal="slide-up"><a href="about.html">About</a></li>
                            <li class="item" data-sal-delay="350" data-sal-duration="1000" data-sal="slide-up"><a href="team.html">Our Team</a></li>
                            <li class="item" data-sal-delay="450" data-sal-duration="1200" data-sal="slide-up"><a href="team-single.html">Team Details</a></li>
                            <li class="item" data-sal-delay="550" data-sal-duration="1400" data-sal="slide-up"><a href="error.html">Error 404</a></li>
                            <li class="item" data-sal-delay="650" data-sal-duration="1600" data-sal="slide-up"><a href="cart.html">Cart Page</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pl_lg--80">
                    <div class="footer-single-wized">
                        <h5 class="wized-title" data-sal-delay="150" data-sal-duration="600" data-sal="slide-up">Company</h5>
                        <ul class="wizid-lists">
                            <li class="item" data-sal-delay="150" data-sal-duration="600" data-sal="slide-up"><a href="wallet.html">Wallet</a></li>
                            <li class="item" data-sal-delay="350" data-sal-duration="1000" data-sal="slide-up"><a href="create.html">Create Page</a></li>
                            <li class="item" data-sal-delay="450" data-sal-duration="1200" data-sal="slide-up"><a href="login.html">Login Page</a></li>
                            <li class="item" data-sal-delay="550" data-sal-duration="1400" data-sal="slide-up"><a href="registration.html">Registration</a></li>
                            <li class="item" data-sal-delay="650" data-sal-duration="1600" data-sal="slide-up"><a href="check-out.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-single-wized">
                        <h5 class="wized-title" data-sal-delay="150" data-sal-duration="600" data-sal="slide-up">Services</h5>
                        <ul class="wizid-lists">
                            <li class="item" data-sal-delay="250" data-sal-duration="800" data-sal="slide-up"><a href="contact.html">Contact Us</a></li>
                            <li class="item" data-sal-delay="350" data-sal-duration="1000" data-sal="slide-up"><a href="shop.html">Shop Page</a></li>
                            <li class="item" data-sal-delay="450" data-sal-duration="1200" data-sal="slide-up"><a href="shop-single.html">Shop Details</a></li>
                            <li class="item" data-sal-delay="550" data-sal-duration="1400" data-sal="slide-up"><a href="collectors.html">Collectors</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area ptb--50 ptb_sm--20">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copy-right">
                            <div class="copy-right-text">
                                <p class="rts-cp">All rights reserved <span>©2022 ReacThemes</span></p>
                            </div>
                            <div class="copy-right-link">
                                <a href="about.html">About</a>
                                <a href="contact.html">Contact Us</a>
                                <a href="registration.html">Registration</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Footer area -->
    <!-- ENd Header Area -->


    <div class="loadingpage">
        <div class="spinner"></div>
    </div>
@endpush
