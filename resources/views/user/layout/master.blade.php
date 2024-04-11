<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('layout/asset/images/favicon.png') }}">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/asset/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/asset/css/responsive.css') }}">

    <!-- Jquery -->
    <script src="{{ asset('layout/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('layout/asset/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('layout/asset/js/jquery-ui.min.js') }}"></script>

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('layout/asset/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/asset/css/themify-icons.css') }}">

</head>

<body class="js p-0 m-0">

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- End Preloader -->


    @include('user.layout.navbar')

    @yield('contents')

    @include('user.layout.footer')


    <!-- Popper JS -->
    <script src="{{ asset('layout/asset/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('layout/asset/js/bootstrap.min.js') }}"></script>

    <!-- Slicknav JS -->
    <script src="{{ asset('layout/asset/js/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('layout/asset/js/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('layout/asset/js/magnific-popup.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('layout/asset/js/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('layout/asset/js/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('layout/asset/js/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('layout/asset/js/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('layout/asset/js/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ asset('layout/asset/js/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('layout/asset/js/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('layout/asset/js/active.js') }}"></script>
</body>

</html>
