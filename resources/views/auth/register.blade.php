@extends('layouts.auth')

@section('content')
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="{{ route('home') }}" class="d-block">
                                                <img src="{{ asset('admins/assets/images/logo-light.png') }}" alt="" height="18">
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white-50 pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" The theme is really great with an amazing customer support."</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" Great! Clean code, clean design, easy for customization. Thanks very much! "</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">{{ __('Register Account') }}</h5>
                                    </div>

                                    <div class="mt-4">
                                        <x-form method="POST" action="{{ route('register') }}">
                                            <x-admin.input
                                                label="{{ __('Name') }}"
                                                class="form-control"
                                                type="text"
                                                name="name"
                                                model="name"
                                                id="name"
                                                placeholder="{{ __('Enter your name') }}"
                                                required
                                            ></x-admin.input>

                                            <x-admin.input
                                                label="{{ __('Email') }}"
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                model="email"
                                                id="email"
                                                placeholder="{{ __('Enter your email') }}"
                                                required
                                            ></x-admin.input>

                                            <x-admin.input
                                                label="{{ __('Password') }}"
                                                class="form-control"
                                                type="password"
                                                name="password"
                                                model="password"
                                                id="password"
                                                placeholder="{{ __('*****************') }}"
                                                required
                                            >
                                                <div class="float-end">
                                                    <a href="{{ route('password.request') }}" class="text-muted">{{ __('Forgot your password?') }}</a>
                                                </div>
                                            </x-admin.input>

                                            <x-admin.input
                                                label="{{ __('Password Confirmation') }}"
                                                class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                model="password_confirmation"
                                                id="password_confirmation"
                                                placeholder="{{ __('*****************') }}"
                                                required
                                            ></x-admin.input>

                                            <x-admin.input
                                                name="g_form_name"
                                                model="g_form_name"
                                                value="register"
                                                hidden
                                            ></x-admin.input>

                                            {!! RecaptchaV3::field('register') !!}

                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('Register') }}
                                                </x-button>
                                            </div>
                                        </x-form>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">{{ __('Register New With') }}</h5>
                                            </div>

                                            <div>
                                                <a href="{{ route('github.redirect') }}" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <x-link
                                            to="{{ route('login') }}"
                                            class="fw-semibold text-primary text-decoration-underline">
                                            {{ __('Sign in your account') }}
                                        </x-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
