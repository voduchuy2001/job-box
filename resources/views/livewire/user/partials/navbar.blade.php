<div>
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
        <div class="container-fluid custom-container">
            <x-link class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="card-logo card-logo-dark" alt="logo dark" height="17">
            </x-link>
            <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    @foreach($labels as $key => $label)
                        <li class="nav-item">
                            <a class="nav-link {{  $active === $key ? 'active' : '' }}" wire:click="activeLink('{{ $key }}')" href="#{{ $key }}">{{ $label }}</a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        @if(app()->getLocale() == 'vi')
                            <a class="nav-link" href="{{ route('language.__invoke', ['locale' => 'en']) }}">{{ __('English') }}</a>
                        @else
                            <a class="nav-link" href="{{ route('language.__invoke', ['locale' => 'vi']) }}">{{ __('Tiếng Việt') }}</a>
                        @endif
                    </li>
                </ul>

                <div>
                    @if(! Auth::check())
                        <a href="{{ route('login') }}" class="btn btn-soft-primary"><i class="ri-user-3-line align-bottom me-1"></i>{{ __('Login & Register') }}</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-soft-primary"><i class="ri-user-3-line align-bottom me-1"></i>{{ __('Hello :name', ['name' => Auth::user()->name]) }}</a>
                    @endif
                </div>
            </div>

        </div>
    </nav>
</div>
