<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {!! RecaptchaV3::initJs() !!}
    <link rel="shortcut icon" href="{{ asset('admins/assets/images/favicon.ico') }}">
    <script src="{{ asset('admins/assets/js/layout.js') }}"></script>
    <link href="{{ asset('admins/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>
<body>
    @include('sweetalert::alert')

    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>

        @yield('content')

    </div>

    <script src="{{ asset('admins/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admins/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admins/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admins/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admins/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('admins/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('admins/assets/js/pages/password-addon.init.js') }}"></script>
    @livewireScripts
</body>
</html>
