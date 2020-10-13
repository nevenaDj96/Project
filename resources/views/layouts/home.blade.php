<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gally </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{csrf_token()}}"/>




    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
    <!-- Themify Icons-->
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>


</head>
<body>
<script>
    const baseUrl='{{url('/')}}';
</script>
@include('components.navigation')
<div class="container">
    @include('components.alerts')
</div>
<main id="page">

    @yield('content')

</main>
@include('components.footer')

<!-- jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('/js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{'/js/owl.carousel.min.js'}}"></script>
<!-- countTo -->
<script src="{{asset('/js/jquery.countTo.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/js/magnific-popup-options.js')}}"></script>
<!-- Main -->
<script src="{{asset('/js/main.js')}}"></script>
<script src="{{asset('/js/js.js')}}"></script>

</body>
</html>
