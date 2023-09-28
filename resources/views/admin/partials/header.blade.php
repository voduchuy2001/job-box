<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="d-flex align-items-center">

                <livewire:admin.partial.notification-component></livewire:admin.partial.notification-component>

                <livewire:admin.partial.toast-component></livewire:admin.partial.toast-component>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar === null ? asset('assets/images/users/avatar-1.jpg') : asset(Auth::user()->avatar->url) }}" alt="{{ Auth::user()->name }}">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->email }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">{{ __('Welcome :name!', ['name' => Auth::user()->name]) }}</h6>
                        <x-link
                            class="dropdown-item"
                            :to="route('user-change-password.index')"><i class="mdi mdi-account-key-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Change Password') }}</span></x-link>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#"><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Site Settings') }}</span></a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle" data-key="t-logout">{{ __('Logout') }}</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
