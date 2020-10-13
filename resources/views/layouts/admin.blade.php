<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gally</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}"/>

    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">



    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">




</head>
<body>
<script>
    const baseUrl='{{url('/')}}';
</script>
@include('components.adminnav')
<div class="container">
    @include('components.alerts')
</div>
<main id="page">

    @yield('content')

</main>

<!-- jQuery -->
<script src="{{asset('/js/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/js.js')}}"></script>

</body>
</html>
