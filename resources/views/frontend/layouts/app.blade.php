@php
    // pr($settings->general);
    $favicon = $settings->getFirstMediaUrl('favicon') ?: asset('frontend/images/fab-icon.png');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Genifty || NFT Market Place Template || - NFT Marketplace Template</title>
    <meta name="robots" content="noindex">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$favicon}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/gordita.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/fontawesome-pro-icons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/vendor/swiper.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/plugins/unicons.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/vendor/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body class="rt_bg-secondary">

    @stack('content')


    <!-- The cursor elements -->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>

    <!-- progress Back to top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- progress Back to top End -->

    <!-- all scripts are hear -->
    <script src="{{asset('frontend/js/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins/nice-select.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/waypoint.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/swiper.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/count-down.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/isotop.min.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/counterup.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins/sal.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins/paper-core.js')}}"></script>
    <script src="{{asset('frontend/js/plugins/simplex-nois.js')}}"></script>
    <script src="{{asset('frontend/js/plugins/contact-form.js')}}"></script>

    <script src="{{asset('frontend/js/vendor/imageloded.js')}}"></script>
    <script src="{{asset('frontend/js/vendor/bootstrap.min.js')}}"></script>

    <!-- main js -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>


<!-- Mirrored from themewant.com/products/html/genifty/index-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 04:17:04 GMT -->
</html>
