<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ace Online - Distance Learning by American Center of English</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/favicon.png')}}">
    <!-- CSS
        ============================================ -->
    <link rel="stylesheet" href="{{asset('/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/eduvibe-font.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/magnifypopup.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/animation.css')}}">
    <link rel="stylesheet" href="{{asset('/css/vendor/jqueru-ui-min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>

<body>
<x-impersonate::banner/>
<div class="main-wrapper">
    <x-shared.header/>
        @yield('content')
    <x-front.footer/>
</div>
<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('/js/vendor/modernizr.min.js')}}"></script>
<!-- jQuery JS -->
<script src="{{asset('/js/vendor/jquery.js')}}"></script>
<script src="{{asset('/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/vendor/sal.min.js')}}"></script>
<script src="{{asset('/js/vendor/backtotop.js')}}"></script>
<script src="{{asset('/js/vendor/magnifypopup.js')}}"></script>
<script src="{{asset('/js/vendor/slick.js')}}"></script>
<script src="{{asset('/js/vendor/countdown.js')}}"></script>
<script src="{{asset('/js/vendor/jquery-appear.js')}}"></script>
<script src="{{asset('/js/vendor/odometer.js')}}"></script>
<script src="{{asset('/js/vendor/isotop.js')}}"></script>
<script src="{{asset('/js/vendor/imageloaded.js')}}"></script>
<script src="{{asset('/js/vendor/lightbox.js')}}"></script>
<script src="{{asset('/js/vendor/wow.js')}}"></script>
<script src="{{asset('/js/vendor/paralax.min.js')}}"></script>
<script src="{{asset('/js/vendor/paralax-scroll.js')}}"></script>
<script src="{{asset('/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('/js/vendor/tilt.jquery.min.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('/js/main.js')}}"></script>
</body>

</html>
