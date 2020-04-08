<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <script src="/js/app.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="/css/main.min.css" rel="stylesheet">
</head>
<body>
@php
$configuration=\App\Configuration::find(1);
@endphp
<div class="container">
    <div id="app">
        <div class="first-header d-inline-flex w-100">
        <div class="logo" style="width: 130px; margin-top: 20px; margin-bottom: 20px;">
            @if(!$configuration->logo)
            <img src="/image/logo.png" class="w-100">
                @else
                <img src="/storage/{{$configuration->logo}}" class="w-100">
                @endif
        </div>
        <div class="float-right" style="width: 87%; margin-top: 40px;">
            <div class="right-text float-right">
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-envelope-open mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i>
                    </div>
                    <div class="text d-inline-block float-right">
                    <p class="mb-0"><b>Pour nous écrire:</b></p>
                    <p class="mb-0 font-weight-light">{{$configuration->email}}</p>
                    </div>
                </div>
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-phone mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i></div>
                    <div class="text d-inline-block float-right">
                    <p class="mb-0"><b>Pour nous appeler:</b></p>
                    <p class="mb-0 font-weight-light">{{$configuration->telephone}}</p>
                    </div>
                </div>
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-swimming-pool mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i></div>
                    <div class="text d-inline-block float-right">
                        <p class="mb-0"><b>Pour se baigner :</b></p>
                        <p class="mb-0 font-weight-light">Profitez de la piscine chauffée.</p>
                    </div>
                </div>
                <a href="{{route('situer_roulotte')}}"><button type="submit" class="btn btn-primary">Situer la roulotte</button></a>
            </div>
        </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <a class="nav nav-link" href="{{route('home')}}">Accueil</a>
                        <a class="nav nav-link" href="{{route('roulotte')}}">La roulotte</a>
                        <a class="nav nav-link" href="{{route('tarifs_reservations')}}">Tarifs & Réservations</a>
                        <a class="nav nav-link" href="{{route('activités')}}">Activités</a>
                        <a class="nav nav-link" href="{{route('contact')}}">Contact</a>
                        @if (\Illuminate\Support\Facades\Auth::check())
                            <a class="nav nav-link" href="{{route('administration')}}">Administration</a>
                        @endif
                    </ul>
                </div>
        </nav>

        <main class="py-4 pt-0" style="">
            @yield('carousel')
            <div class="mt-3">
            @yield('breadcrumbs')
            </div>
            <div class="content" style="padding: 10px;">
            @yield('content')
            </div>
            @auth
                <div class="row ml-0 mr-0">
                    <div class="col-md-3">
                        @yield('left-content')
                    </div>
                    <div class="col-md-9">
                        @yield('right-content')
                    </div>
                </div>
                @endauth
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="color:white;">© {{date('Y')}} Réalisé par Pierre-Louis Giraud
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>
</body>
</html>
