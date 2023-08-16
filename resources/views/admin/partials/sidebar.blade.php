<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-light">
               <span class="logo-sm">
                    <img src="{{ asset('admins/assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
            <span class="logo-lg">
                <img src="{{ asset('admins/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{ __('Menu') }}</span></li>

                <li class="nav-item">
                    <x-link
                        class="nav-link menu-link @if(request()->routeIs('user')) active @endif"
                        to="{{ route('user.index') }}"
                    >
                        <i class="ri-user-line"></i><span>{{ __('Users') }}</span>
                    </x-link>
                </li>

                <li class="nav-item">
                    <x-link
                        class="nav-link menu-link"
                        to="{{ route('user.index') }}"
                    >
                        <i class="ri-user-line"></i><span>{{ __('Companies') }}</span>
                    </x-link>
                </li>

                <li class="nav-item">
                    <a
                        target="_blank"
                        class="nav-link menu-link"
                        href="{{ route('elfinder.index') }}"
                    >
                        <i class="ri-image-line"></i><span data-key="t-widgets">{{ __('Media Files') }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#jobs" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarTables">
                        <i class="ri-layout-grid-line"></i> <span data-key="t-tables">{{ __('Jobs') }}</span>
                    </a>
                    <div class="collapse menu-dropdown" id="jobs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="tables-basic.html" class="nav-link" data-key="job-list">{{ __('List Of Jobs') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="tables-gridjs.html" class="nav-link" data-key="comments">{{ __('Comments') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="vertical-overlay"></div>
