<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>@yield('title')</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('./images/Logo.png')}}">
        <link rel="stylesheet" href="{{asset('./vendor/chartist/css/chartist.min.css')}}">
        <link href="{{asset('./vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{asset('./vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('./css/style.css')}}" rel="stylesheet">
        @yield('style')
    </head>
    <body class="vh-100">
        <div class="authincation h-100">
            @include('layouts.flash_messages')
            <div class="container h-100">
                @yield('content')
            </div>
        </div>
        <script src="{{asset('./vendor/global/global.min.js')}}"></script>
        <script src="{{asset('./vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
        <script src="{{asset('./vendor/chart.js/Chart.bundle.min.js')}}"></script>
        <script src="{{asset('./vendor/peity/jquery.peity.min.js')}}"></script>
        <script src="{{asset('./vendor/apexchart/apexchart.js')}}"></script>
        <script src="{{asset('./js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{asset('./vendor/owl-carousel/owl.carousel.js')}}"></script>
        <script src="{{asset('./js/custom.min.js')}}"></script>
        <script src="{{asset('./js/deznav-init.js')}}"></script>
        @yield('script')
    </body>
</html>
