<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('/images/icon.png') }}" >
    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>@yield('title')</title>
</head>
<body>

    @yield('content')

    <script src="https://use.fontawesome.com/96722a5c2c.js"></script>
    <script src="{{ asset('js/jquery.3.4.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/knockout.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
