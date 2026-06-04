<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>@yield('title', 'Zp Hotels')</title>

    <!-- site Favicon -->
    <link rel="icon" href="{{ url('assets/img/logo/favicon.png')}}" type="image/x-icon">

    <!-- Css All Plugins Files -->
    <link rel="stylesheet" href="{{ url('assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/aos.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/slick.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/vendor/swiper-bundle.min.css')}}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">

</head>

<body>
    @include('frontend.components.loader')
    @include('frontend.components.navbar')

    @yield('content')

    @include('frontend.components.footer')
    @include('frontend.components.back-to-top')
    @include('frontend.components.book-modal')
    @include('frontend.components.theme-settings')



    <!-- Plugins -->
    <script src="{{ url('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/aos.js')}}"></script>
    <script src="{{ url('assets/js/vendor/smoothscroll.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/jquery.fancybox.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{ url('assets/js/vendor/swiper-bundle.min.js')}}"></script>

    <!-- main-js -->
    <script src="{{ url('assets/js/main.js')}}"></script>
    @stack('scripts')
</body>

</html>