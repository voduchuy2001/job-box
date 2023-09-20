<div class="card" wire:ignore>
    <div class="card-body">
        <div class="list-group list-group-fill-primary">
            <x-link
                :to="route('user-profile.user')"
                class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-profile.user' ? 'active' : '' }}">
                <i class="ri-user-3-line align-middle me-2"></i>{{ __('User Profile') }}</x-link>

            <x-link
                href="#"
                class="list-group-item list-group-item-action"><i class="ri-database-2-line align-middle me-2"></i>{{ __('Job Applied') }}</x-link>

            <x-link
                :to="route('user-wishlist.user')"
                class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-wishlist.user' ? 'active' : '' }}"><i class="ri-heart-2-line align-middle me-2"></i>{{ __('Wishlist Jobs') }}</x-link>

            <x-link
                :to="route('user-change-password.user')"
                class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-change-password.user' ? 'active' : '' }}"><i class="ri-shield-check-line align-middle me-2"></i>{{ __('Change Password') }}</x-link>

            <a
                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
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
