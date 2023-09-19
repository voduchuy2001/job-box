<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body px-4 pb-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ $user->avatar != null ? asset($user->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="{{ $user->name }}" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $user->name }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div>
                                                            <i class="ri-building-line align-bottom me-1"></i>
                                                            {{ $user->name }}
                                                        </div>

                                                        @if($user->addresses->count())
                                                            <div class="vr"></div>
                                                            <div><i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $user->addresses[0]->province->name }}</div>
                                                        @endif

                                                        <div class="vr"></div>

                                                        <div>{{ __('Join in: :in', ['in' => BaseHelper::dateFormat($user->email_verified_at)]) }}</span></div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-success fs-12">{{ $user->status }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-n5">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group list-group-fill-primary">
                                <x-link
                                    :to="route('user-profile.user')"
                                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-profile.user' ? 'active' : '' }}">
                                    <i class="ri-user-3-line align-middle me-2"></i>{{ __('User Profile') }}</x-link>

                                <x-link
                                    href="#"
                                    class="list-group-item list-group-item-action"><i class="ri-shield-check-line align-middle me-2"></i>{{ __('Change Password') }}</x-link>

                                <x-link
                                    href="#"
                                    class="list-group-item list-group-item-action"><i class="ri-heart-2-line align-middle me-2"></i>{{ __('Wishlist Jobs') }}</x-link>

                                <x-link
                                    href="#"
                                    class="list-group-item list-group-item-action"><i class="ri-database-2-line align-middle me-2"></i>{{ __('Applications Jobs') }}</x-link>

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
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            main
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
