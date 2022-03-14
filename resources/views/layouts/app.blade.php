<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.png')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
        <link href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/aos/css/aos.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/metismenu/css/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all" data-turbolinks-track="true">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all" data-turbolinks-track="true">
        <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all" data-turbolinks-track="true">
        @yield('styles')
        @toastr_css
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
        @toastr_js
        @toastr_render
        @env('local')
            <script src="http://localhost:35729/livereload.js"></script>
        @endenv
    </body>
</html>
