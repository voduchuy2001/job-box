<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! RecaptchaV3::initJs() !!}
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    @include('sweetalert::alert')

    @yield('content')

    @livewireScripts
</body>
</html>
