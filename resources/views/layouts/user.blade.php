<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('users/assets/images/favicon.ico') }}">
    <link href="{{ asset('users/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    <link href="{{ asset('users/assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('users/assets/libs/%40iconscout/unicons/css/line.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('users/assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('users/assets/css/styles.css') }}" rel="stylesheet" type="text/css">

    {!! RecaptchaV3::initJs() !!}
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="dark:bg-slate-900">
    @include('sweetalert::alert')

    @yield('content')

    <script src="{{ asset('users/assets/libs/tobii/js/tobii.min.js') }}"></script>
    <script src="{{ asset('users/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('users/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('users/assets/js/plugins.init.js') }}"></script>
    <script src="{{ asset('users/assets/js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
