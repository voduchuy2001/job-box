@extends('layouts.auth')

@section('content')
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">

                            @include('auth.partials.slider')

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">{{ __('Register Account') }}</h5>
                                    </div>

                                    <div class="mt-4">
                                        <x-form method="POST" action="{{ route('register') }}">
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

                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('Register') }}
                                                </x-button>
                                            </div>
                                        </x-form>

                                        <div class="mt-4 text-center">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title">{{ __('Continue With') }}</h5>
                                            </div>

                                            <div>
                                                <a href="{{ route('socialite.redirect', ['provider' => 'github']) }}" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></a>
                                                <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></a>
                                                <a href="{{ route('socialite.redirect', ['provider' => 'facebook']) }}" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></a>
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
