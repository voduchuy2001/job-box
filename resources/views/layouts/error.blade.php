<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('admins/assets/js/layout.js') }}"></script>
    <link href="{{ asset('admins/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    @include('sweetalert::alert')

    @yield('content')

</body>

</html>
