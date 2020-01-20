<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PortalPro - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/libs/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs/tempusdominus-datetimepicker.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/libs/toastr.min.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')

@include('layouts.sidebar')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="title">
                <h2>@yield('title')</h2>
            </div>
        </div>
        <div class="col-sm-4 text-right pt-3">
            @hasSection('create-action')
                <button class="btn btn-primary" onclick="location.href = '@yield('create-action')'">+ Tambah</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('js/libs/jquery.min.js') }}"></script>
<script src="{{ asset('js/libs/popper.min.js') }}"></script>
<script src="{{ asset('js/libs/moment.min.js') }}"></script>
<script src="{{ asset('js/libs/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/libs/kit.fontawesome.js') }}"></script>
<script src="{{ asset('js/libs/tempusdominus-datetimepicker.js') }}"></script>
<script src="{{asset('js/libs/toastr.min.js')}}"></script>
@include('layouts.alert')
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#sidebar-wrapper").css('height', $('body').height());
</script>

@stack('scripts')
</body>
</html>
