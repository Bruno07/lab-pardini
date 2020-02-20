<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-material-design.min.css') }}">

    <title>@yield('title')</title>
</head>
<body>
    @yield('content')

    <script src="https://use.fontawesome.com/96722a5c2c.js"></script>
    <script src="{{ asset('js/jquery.3.4.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('js/knockout.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
