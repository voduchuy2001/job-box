<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {!! RecaptchaV3::initJs() !!}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @vite(['resources/sass/app.scss'])
    @livewireStyles
</head>
<body>

<div class="layout-wrapper landing">
    @include('user.partials.navbar')

    {{ $slot }}

    <livewire:user.home.modules.categories></livewire:user.home.modules.categories>

    <section class="py-5 bg-primary position-relative">
        <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-sm">
                    <div>
                        <h4 class="text-white mb-2">Ready to Started?</h4>
                        <p class="text-white-50 mb-0">Create new account and refer your friend</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-sm-auto">
                    <div>
                        <a href="#!" class="btn bg-gradient btn-danger">Create Free Account</a>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <livewire:user.home.modules.jobs></livewire:user.home.modules.jobs>

    <section class="section">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="text-muted mt-5 mt-lg-0">
                        <h5 class="fs-12 text-uppercase text-success">Hot Featured Company</h5>
                        <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">Get <span class="text-primary">10,000+</span> Featured Companies</h1>
                        <p class="ff-secondary mb-2">The demand for content writing services is growing. This is because content is required in almost every industry. <b>Many companies have discovered how effective content marketing is.</b> This is a major reason for this increase in demand.</p>
                        <p class="mb-4 ff-secondary">A Content Writer is a professional who writes informative and engaging articles to help brands showcase their products.</p>

                        <div class="mt-4">
                            <a href="index.html" class="btn btn-primary">View More Companies <i class="ri-arrow-right-line align-middle ms-1"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4 col-sm-7 col-10 ms-lg-auto mx-auto order-1 order-lg-2">
                    <div>
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <button type="button" class="btn btn-icon btn-soft-primary float-end" data-bs-toggle="button" aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                                <div class="avatar-sm mb-4">
                                    <div class="avatar-title bg-soft-secondary rounded">
                                        <img src="assets/images/companies/img-1.png" alt="" class="avatar-xxs">
                                    </div>
                                </div>
                                <a href="#!">
                                    <h5>New Web designer</h5>
                                </a>
                                <p class="text-muted">Themesbrand</p>

                                <div class="d-flex gap-4 mb-3">
                                    <div>
                                        <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Escondido,California
                                    </div>

                                    <div>
                                        <i class="ri-time-line text-primary me-1 align-bottom"></i> 3 min ago
                                    </div>
                                </div>

                                <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent.</p>

                                <div class="hstack gap-2">
                                    <span class="badge badge-soft-success">Full Time</span>
                                    <span class="badge badge-soft-primary">Freelance</span>
                                    <span class="badge badge-soft-danger">Urgent</span>
                                </div>

                                <div class="mt-4 hstack gap-2">
                                    <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                    <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-lg bg-info mb-0 features-company-widgets rounded-3">
                            <div class="card-body">
                                <h5 class="text-white fs-16 mb-4">10,000+ Featured Companies</h5>

                                <div class="d-flex gap-1">
                                    <a href="javascript: void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                <img src="assets/images/companies/img-5.png" alt="" height="15">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                <img src="assets/images/companies/img-2.png" alt="" height="15">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                <img src="assets/images/companies/img-8.png" alt="" height="15">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light bg-opacity-25 rounded-circle">
                                                <img src="assets/images/companies/img-7.png" alt="" height="15">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript: void(0);" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="More Companies">
                                        <div class="avatar-xs">
                                            <div class="avatar-title fs-11 rounded-circle bg-light bg-opacity-25 text-white">
                                                1k+
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    <livewire:user.home.modules.blogs></livewire:user.home.modules.blogs>

    <section class="py-5 bg-primary position-relative">
        <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-sm">
                    <div>
                        <h4 class="text-white fw-semibold">Get New Jobs Notification!</h4>
                        <p class="text-white-75 mb-0">Subscribe & get all related jobs notification.</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-sm-auto">
                    <button class="btn btn-danger" type="button">Subscribe Now <i class="ri-arrow-right-line align-bottom"></i></button>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>

    @include('user.partials.footer')
</div>

<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
<x-livewire-alert::scripts />
<script data-navigate-once src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script data-navigate-once src="{{ asset('assets/js/pages/job-lading.init.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@livewireScripts
</body>
</html>
