<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('admins/assets/images/favicon.ico') }}">
    <link href="{{ asset('admins/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admins/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>
<body>
    @include('sweetalert::alert')

    <div id="layout-wrapper">

        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    {{ $slot }}

                </div>
            </div>
        </div>
    </div>

    <script data-navigate-once src="{{ asset('admins/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('admins/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('admins/assets/libs/node-waves/waves.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('admins/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('admins/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('admins/assets/js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
