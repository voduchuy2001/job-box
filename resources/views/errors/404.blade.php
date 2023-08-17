@extends('layouts.error')

@section('content')
    <div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="auth-page-content overflow-hidden p-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-4 text-center">
                        <div class="error-500 position-relative">
                            <img src="{{ asset('admins/assets/images/error.png') }}" alt="" class="img-fluid error-500-img error-img" />
                            <h1 class="title text-muted">{{ __('404') }}</h1>
                        </div>
                        <div>
                            <h4>{{ __('Page Not Found') }}</h4>
                            <p class="text-muted w-75 mx-auto">{{ __('It looks like the page you are looking for does not exist or has been deleted.') }}</p>
                            <a href="{{ route('home') }}" class="btn btn-success"><i class="mdi mdi-home me-1"></i>{{ __('Back to home') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
