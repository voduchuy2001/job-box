<div>
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
        <div class="container-fluid custom-container">
            <x-link :to="route('home')" class="navbar-brand">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="17">
            </x-link>
            <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                    <li class="nav-item">
                        <x-link
                            :to="route('home')"
                            class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}">{{ __('Home') }}</x-link>
                    </li>
                    <li class="nav-item">
                        <x-link
                            :to="route('user.job-list')"
                            class="nav-link {{ request()->route()->getName() == 'user.job-list' ? 'active' : '' }}">{{ __('Jobs') }}</x-link>
                    </li>

                    @if(! Auth::check())
                        <li class="nav-item">
                            <a
                                href="{{ route('student-profile.user') }}"
                                class="nav-link">{{ __('Resume') }}</a>
                        </li>
                    @endif

                    @auth
                        <li class="nav-item">
                            <x-link
                                :to="route('student-profile.user')"
                                class="nav-link {{ in_array(request()->route()->getName(), ['student-profile.user', 'student-resume.user', 'student-wishlist.user', 'user-change-password.user']) ? 'active' : '' }}">{{ __('Profile') }}</x-link>
                        </li>
                    @endauth
                </ul>
                <div>
                    @if(app()->getLocale() == 'vi')
                        <a class="btn btn-link fw-medium text-decoration-none text-dark" href="{{ route('language.__invoke', ['locale' => 'en']) }}">{{ __('English') }}</a>
                    @else
                        <a class="btn btn-link fw-medium text-decoration-none text-dark" href="{{ route('language.__invoke', ['locale' => 'vi']) }}">{{ __('Tiếng Việt') }}</a>
                    @endif
                    @unless(Auth::check())
                        <a href="{{ route('login') }}" class="btn btn-soft-primary"><i class="ri-user-3-line align-bottom me-1"></i>{{ __('Login & Register') }}</a>
                    @endunless

                    @auth
                        <x-link
                            :to="route('student-profile.user')"
                            class="btn btn-soft-primary">
                            <i class="ri-user-3-line align-bottom me-1"></i>
                            {{ __('Hello :name', ['name' => Auth::user()->name]) }}</x-link>
                    @endauth
                </div>
            </div>

        </div>
    </nav>
</div>
