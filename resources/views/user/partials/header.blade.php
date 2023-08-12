<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <a class="logo" href="{{ route('home') }}">
            <div class="block sm:hidden">
                <img src="{{ asset('users/assets/images/logo-icon-40.png') }}" class="h-10 inline-block dark:hidden"  alt="">
                <img src="{{ asset('users/assets/images/logo-icon-40-white.png') }}" class="h-10 hidden dark:inline-block"  alt="">
            </div>
            <div class="sm:block hidden">
                <img src="{{ asset('users/assets/images/logo-dark.png') }}" class="h-[24px] inline-block dark:hidden" alt="">
                <img src="{{ asset('users/assets/images/logo-white.png') }}" class="h-[24px] hidden dark:inline-block" alt="">
            </div>
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="buy-button list-none mb-0">
            <li class="inline-block ps-1 mb-0">
                @if(! Auth::user())
                    <a href="{{ route('login') }}" class="btn btn-icon rounded-full bg-emerald-600 hover:bg-emerald-700 hover:border-emerald-700 text-white"><img src="{{ asset('users/assets/images/team/05.png') }}" class="rounded-full" alt=""></a>
                @endif
            </li>
        </ul>

        <div id="navigation">
            <ul class="navigation-menu justify-end">
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">{{ __('Job') }}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="index-two.html" class="sub-menu-item">Hero Two</a></li>
                        <li><a href="index-three.html" class="sub-menu-item">Hero Three</a></li>
                        <li><a href="index-four.html" class="sub-menu-item">Hero Four</a></li>
                        <li><a href="index-five.html" class="sub-menu-item">Hero Five</a></li>
                        <li><a href="index-six.html" class="sub-menu-item">Hero Six </a></li>
                        <li><a href="index-seven.html" class="sub-menu-item">Hero Seven </a></li>
                    </ul>
                </li>

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">{{ __('Profile and CV') }}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="index-two.html" class="sub-menu-item">Hero Two</a></li>
                        <li><a href="index-three.html" class="sub-menu-item">Hero Three</a></li>
                        <li><a href="index-four.html" class="sub-menu-item">Hero Four</a></li>
                        <li><a href="index-five.html" class="sub-menu-item">Hero Five</a></li>
                        <li><a href="index-six.html" class="sub-menu-item">Hero Six </a></li>
                        <li><a href="index-seven.html" class="sub-menu-item">Hero Seven </a></li>
                    </ul>
                </li>

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">{{ __('Company') }}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="index-two.html" class="sub-menu-item">Hero Two</a></li>
                        <li><a href="index-three.html" class="sub-menu-item">Hero Three</a></li>
                        <li><a href="index-four.html" class="sub-menu-item">Hero Four</a></li>
                        <li><a href="index-five.html" class="sub-menu-item">Hero Five</a></li>
                        <li><a href="index-six.html" class="sub-menu-item">Hero Six </a></li>
                        <li><a href="index-seven.html" class="sub-menu-item">Hero Seven </a></li>
                    </ul>
                </li>

                <li>
                    @if(app()->getLocale() === 'vi')
                        <a href="{{ url('lang/en') }}" class="sub-menu-item">{{ __('English') }}</a>
                    @else
                        <a href="{{ url('lang/vi') }}" class="sub-menu-item">{{ __('Tiếng Việt') }}</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
