<?php
    // pr($settings->general);
    $logo = $settings->getFirstMediaUrl('logo') ?: asset('frontend/images/logo/logo-01.svg');
?>

<!-- start header area -->
<div class="header-slider-banner">
    <div class="rts-header-area header-inner-one header--sticky">
        <div class="container-header">
            <div class="row align-items-center ptb_sm--20 padding-controler-header">
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 ">
                    <div class="header-left">
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                            <img src="<?php echo e($logo); ?>" alt="NFT_image">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 d-xl-block d-none">
                    <div class="main-menu-wrapepr">
                        <nav class="mainmenu-nav d-none d-xl-block">
                            <ul class="main-menu text-right">
                                
                                <?php echo $__env->make('frontend.partials.main-menu', ['device' => NULL], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                                
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
                        
                        <ul class="icons">
                            <?php if(auth()->user()): ?>
                                <li class="single-items icon user"> <a  class="navmain" href="<?php echo e(route('profile.show')); ?>"><i class="far fa-user"></i></a>
                                </li>
                            <?php else: ?>
                                <li class="icon user"> <a href="<?php echo e(route('login')); ?>">Login</a></li>
                                <li class="icon user"> <a href="<?php echo e(route('register')); ?>">Register</a></li>
                            <?php endif; ?>
                            
                        </ul>
                        
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

                    <?php echo $__env->make('frontend.partials.main-menu', ['device' => 'mobile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </ul>
            </nav>
            <!-- nav style hear End -->
        </div>
    </div>
    <!-- mobile menu end -->
    <!-- end mobile menue -->
    <?php if(!empty($sliders) && count($sliders) > 0): ?>
    <div class="rts-banner-area banner-four-area banner-one rt_bg-secondary rts-section-gapBottom pt--100 pt_md--60 pt_sm--50 bg_tr-image--1" style="height: 850px;">
        <div class="container parallaxSwiper swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="swiper-slide row row-reverce-sm pt--150">
                    <div class="col-lg-7 order-lg-1 order-md-2 order-sm-2">
                        <div class="banner-one-left-inner">
                            <h1 class="title" data-sal-delay="150" data-sal-duration="800" data-sal="slide-up">
                                <?php echo e($slider['name']); ?>

                            </h1>
                            <?php echo $slider['content']; ?>

                            
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-2 order-md-1 order-sm-1">
                        <div class="thumbnail-one thum-four">
                            <img src="<?php echo e($slider->getFirstMediaUrl('image') ?: 'assets/images/banner/banner-02.png'); ?>" alt="<?php echo e($slider['name']); ?>">
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Slide 2 -->
                
            </div>
            <!-- Swiper Pagination and Navigation Controls -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <?php endif; ?>
</div>
    <!-- banner area start -->
<?php /**PATH /media/anonymous/12a8dd6f-3122-4159-adcf-832ac2c3572d/laravel/cms_api_service/resources/views/frontend/layouts/header.blade.php ENDPATH**/ ?>