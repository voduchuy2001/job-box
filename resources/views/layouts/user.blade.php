<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/leaflet/leaflet.css') }}" rel="stylesheet" type="text/css" />
    <script data-navigate-track src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>
    @vite(['resources/css/app.css'])
    @stack('styles')
    @livewireStyles
</head>
<body>
    <div class="layout-wrapper landing">
        @include('user.partials.navbar')

        {{ $slot }}

        @if(! Auth::user())
            <section class="py-5 bg-primary position-relative">
                <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
                <div class="container">
                    <div class="row align-items-center gy-4">
                        <div class="col-sm">
                            <div>
                                <h4 class="text-white mb-2">{{ __('Ready to Started?') }}</h4>
                                <p class="text-white-50 mb-0">{{ __('Create new account and refer your friend') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <a
                                    href="{{ route('login') }}"
                                    class="btn bg-gradient btn-danger">{{ __('Create Free Account') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <button onclick="topFunction()" class="btn btn-info btn-icon landing-back-top" id="back-to-top" style="display: block;">
            <i class="ri-arrow-up-line"></i>
        </button>

        @include('user.partials.footer')
    </div>

    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <x-livewire-alert::scripts />
    <script data-navigate-once src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/job-lading.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
