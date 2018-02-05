<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Restaurante')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta conent="Come rico en el mejor restaurante de la ciudad, servicio de primera." name="description">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flexboxgrid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css')}}" rel="stylesheet">
    <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>   

</head>
<body>
    @yield('content')
</body>

    <script crossorigin="anonymous" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" asyn src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
      window.jQuery || document.write("<script src='js/jquery-3.2.1.min.js'><\/script>")
    </script>
    <script asyn src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYJRlrlag1wwxCdQd3ZnluYUuNRPzLeeY"></script>
    <script asyn src="{{ asset('dist/maps.js' )}}"></script>
    <script asyn src="{{ asset('dist/form_object.js') }}"></script>
    <script asyn src="{{ asset('dist/main.js') }}"></script>
    <script asyn src="{{ asset('js/sweetalert2.min.js') }}"></script>
</html>

