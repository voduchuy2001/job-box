<div class="card" wire:ignore>
    <div class="card-body">
        <div class="list-group list-group-fill-primary">
            @can('company-profile-create')
                @if(! Auth::user()->hasRole('Super Admin'))
                    <x-link
                        :to="route('company-profile.user')"
                        class="list-group-item list-group-item-action {{ request()->route()->getName() == 'company-profile.user' ? 'active' : '' }}">
                        <i class="ri-building-line align-middle me-2"></i>{{ __('Company Profile') }}</x-link>
                @endif
            @endcan

            @can('company-job-list')
                @if(Auth::user()->profile && ! Auth::user()->hasRole('Super Admin'))
                    <x-link
                        :to="route('company-job-list.user')"
                        class="list-group-item list-group-item-action {{ in_array(request()->route()->getName(), ['company-job-list.user', 'company-job-create.user', 'company-job-edit.user']) ? 'active' : '' }}">
                        <i class="ri-file-2-line align-middle me-2"></i>{{ __('List Of Jobs') }}</x-link>

                @endif
            @endcan

            @can('student-profile-create')
                @if(! Auth::user()->hasRole('Super Admin'))
                    <x-link
                        :to="route('student-profile.user')"
                        class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-profile.user' ? 'active' : '' }}">
                        <i class="ri-user-3-line align-middle me-2"></i>{{ __('Student Profile') }}</x-link>
                @endif
            @endcan

            @can('student-resume-create')
                @if(Auth::user()->profile && ! Auth::user()->hasRole('Super Admin'))
                    <x-link
                        :to="route('student-resume.user')"
                        class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-resume.user' ? 'active' : '' }}">
                        <i class="ri-todo-line align-middle me-2"></i>{{ __('Resume') }}</x-link>
                @endif
            @endcan

            @can('student-job-apply')
                @if(! Auth::user()->hasRole('Super Admin'))
                    <x-link
                        href="#"
                        class="list-group-item list-group-item-action"><i class="ri-database-2-line align-middle me-2"></i>{{ __('Job Applied') }}</x-link>
                @endif
            @endcan

            @can('student-job-wishlist')
                <x-link
                    :to="route('student-wishlist.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-wishlist.user' ? 'active' : '' }}"><i class="ri-heart-2-line align-middle me-2"></i>{{ __('Wishlist Jobs') }}</x-link>
            @endcan

            <x-link
                :to="route('user-change-password.user')"
                class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-change-password.user' ? 'active' : '' }}"><i class="ri-shield-check-line align-middle me-2"></i>{{ __('Change Password') }}</x-link>

            <a
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                href="{{ route('logout') }}"
                class="list-group-item list-group-item-action">
                <i class="ri-logout-box-line align-middle me-2"></i>{{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </div>
    </div>
</div>
