<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title', 'Restaurante')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css?v=1.2.0') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    
</head>
<body>
    

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{ asset('img/sidebar-1.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag

    -->
            <div class="logo">
                <a href="" class="simple-text">
                    @yield('name-rest')
                </a>               
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">                    
                    
                    @if (auth()->user()->admin)
                    <li class="@yield('menu-active')">
                        <a href="{{ url('/home') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Productos</p>
                        </a>
                    </li>
                    <li class="@yield('category-active')">
                        <a href="{{ url('/admin/categories') }}">
                            <i class="material-icons">bubble_chart</i>
                            <p>Categorías</p>
                        </a>
                    </li>
                    <li class="@yield('config-active')">
                        <a href="{{ url('/admin/config') }}">
                            <i class="material-icons">person</i>
                            <p>Configuración</p>
                        </a>
                    </li>
                    @else
                    <li class="@yield('menu-active')">
                        <a href="{{ url('/home') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Menú</p>
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
     </div>
     <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Menú v 0.1 </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            @guest

                            @else
                            <li class="dropdown">                                
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                    <i class="material-icons">person</i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>                                            
                                        <li>
                                            <a href=" {{ url('/') }} ">Sitio web</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Salir
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>        
        <div class="content">
            @yield('content')
            @yield('script')
            
        </div>
     </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{ asset('js/arrive.min.js') }}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js?v=1.2.0') }}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>
</html>

