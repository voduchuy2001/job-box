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
                <div>
                    <livewire:admin.partial.notification-component wire:key="adminNotificationComponent"></livewire:admin.partial.notification-component>
                </div>

                <div>
                    <livewire:admin.partial.toast-component wire:key="adminToastComponent"></livewire:admin.partial.toast-component>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ Auth::user()->avatar === null ? asset('assets/images/users/avatar-1.jpg') : asset(Auth::user()->avatar->url) }}" alt="{{ Auth::user()->email }}">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->email }}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" id="verified"><g clip-path="url(#clip0_1084_3803)"><path fill="#4DC4FF" d="M13.3546 1.46995C12.6544 0.614752 11.3466 0.614755 10.6465 1.46995L9.65463 2.6814C9.58665 2.76443 9.47325 2.79482 9.37286 2.7569L7.90817 2.20367C6.87422 1.81314 5.74163 2.46703 5.56286 3.55774L5.30963 5.10281C5.29227 5.20871 5.20926 5.29172 5.10335 5.30908L3.55829 5.56231C2.46759 5.74108 1.81368 6.87366 2.20422 7.90762L2.75745 9.37231C2.79537 9.4727 2.76498 9.5861 2.68195 9.65408L1.4705 10.6459C0.615302 11.3461 0.615304 12.6539 1.4705 13.3541L2.68195 14.3459C2.76498 14.4139 2.79537 14.5273 2.75745 14.6277L2.20422 16.0924C1.81369 17.1263 2.46758 18.2589 3.55829 18.4377L5.10335 18.6909C5.20926 18.7083 5.29227 18.7913 5.30963 18.8972L5.56286 20.4422C5.74163 21.5329 6.87421 22.1868 7.90817 21.7963L9.37286 21.2431C9.47325 21.2052 9.58665 21.2355 9.65463 21.3186L10.6465 22.53C11.3466 23.3852 12.6544 23.3852 13.3546 22.53L14.3464 21.3186C14.4144 21.2355 14.5278 21.2052 14.6282 21.2431L16.0929 21.7963C17.1269 22.1868 18.2595 21.5329 18.4382 20.4422L18.6915 18.8972C18.7088 18.7913 18.7918 18.7083 18.8977 18.6909L20.4428 18.4377C21.5335 18.2589 22.1874 17.1263 21.7969 16.0924L21.2436 14.6277C21.2057 14.5273 21.2361 14.4139 21.3191 14.3459L22.5306 13.3541C23.3858 12.6539 23.3858 11.3461 22.5306 10.6459L21.3191 9.65408C21.2361 9.5861 21.2057 9.4727 21.2436 9.37231L21.7969 7.90762C22.1874 6.87366 21.5335 5.74108 20.4428 5.56231L18.8977 5.30908C18.7918 5.29172 18.7088 5.20871 18.6915 5.10281L18.4382 3.55774C18.2595 2.46704 17.1269 1.81313 16.0929 2.20367L14.6282 2.7569C14.5278 2.79482 14.4144 2.76443 14.3464 2.6814L13.3546 1.46995Z"></path><path fill="#ECEFF1" fill-rule="evenodd" d="M18.0303 7.96967C18.3232 8.26256 18.3232 8.73744 18.0303 9.03033L11.0303 16.0303C10.8897 16.171 10.6989 16.25 10.5 16.25C10.3011 16.25 10.1103 16.171 9.96967 16.0303L5.96967 12.0303C5.67678 11.7374 5.67678 11.2626 5.96967 10.9697C6.26256 10.6768 6.73744 10.6768 7.03033 10.9697L10.5 14.4393L16.9697 7.96967C17.2626 7.67678 17.7374 7.67678 18.0303 7.96967Z" clip-rule="evenodd"></path></g><defs><clipPath id="clip0_1084_3803"><rect width="24" height="24" fill="#fff"></rect></clipPath></defs></svg> {{ Auth::user()->email_verified_at ? __('Verified') : 'Unverified Account' }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <h6 class="dropdown-header">{{ __('Welcome :name!', ['name' => Auth::user()->email]) }}</h6>
                        <x-link
                            class="dropdown-item"
                            :to="route('user-change-password.index')"><i class="mdi mdi-account-key-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{ __('Change Password') }}</span></x-link>

                        <div class="dropdown-divider"></div>

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
