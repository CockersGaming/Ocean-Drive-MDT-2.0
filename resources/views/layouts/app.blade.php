<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.png')}}">
        <link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
        <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        @yield('styles')
    </head>

    <body>
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <div id="main-wrapper">
            @include('layouts.includes.nav-head')
            @include('layouts.includes.header')
            @include('layouts.includes.sidebar')
            <div class="content-body">
                <div class="container-fluid">
                    @include('layouts.flash_messages')
                    @yield('content')
                </div>
            </div>
        </div>
        <script src="{{asset('vendor/global/global.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>
        <script src="{{asset('js/custom.min.js')}}"></script>
        <script src="{{asset('js/deznav-init.js')}}"></script>
        @yield('scripts')
    </body>
</html>
