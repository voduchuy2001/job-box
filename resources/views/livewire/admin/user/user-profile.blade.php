<div>
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="{{ $user->coverImage === null ? asset('admins/assets/images/profile-bg.jpg') : asset($user->coverImage->url) }}" alt="{{ $user->name }}" class="profile-wid-img" />
        </div>
    </div>

    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="{{ $user->avatar === null ? asset('admins/assets/images/users/avatar-1.jpg') : asset($user->avatar->url) }}" alt="{{ $user->name }}" class="img-thumbnail rounded-circle" />
                </div>
            </div>

            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ $user->name }}</h3>
                    <p class="text-white-75">{{ $user->role->name }}</p>
                    <div class="hstack text-white-50 gap-1">
                        <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>California, United States</div>
                        <div>
                            <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Themesbrand
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-auto order-last order-lg-0">
                <div class="row text text-white-50 text-center">
                    <div class="col-lg-6 col-4">
                        <div class="p-2">
                            <h4 class="text-white mb-1">24.3K</h4>
                            <p class="fs-14 mb-0">Views</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex">
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">{{ __('Overview') }}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0">
                        <x-link
                            to="{{ route('user-edit.profile', ['id' => $user->id]) }}"
                            class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i>{{ __('Edit Profile') }}</x-link>
                    </div>
                </div>
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">
                                <x-admin.card>
                                    <h5 class="card-title mb-3">Info</h5>
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                            <tr>
                                                <th class="ps-0" scope="row">{{ __('Full Name:') }}</th>
                                                <td class="text-muted">{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Mobile:</th>
                                                <td class="text-muted">+(1) 987 6543</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">{{ __('Email:') }}</th>
                                                <td class="text-muted">{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Location:</th>
                                                <td class="text-muted">California, United States
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">{{ __('Joining Date') }}</th>
                                                <td class="text-muted">{{ DateHelper::dateFormat($user->created_at) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </x-admin.card>

                                <x-admin.card>
                                    <h5 class="card-title mb-4">{{ __('Portfolio') }}</h5>
                                    <div class="d-flex flex-wrap gap-2">
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                                        <i class="ri-github-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                                        <i class="ri-global-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-success">
                                                                        <i class="ri-dribbble-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="javascript:void(0);" class="avatar-xs d-block">
                                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                                        <i class="ri-pinterest-fill"></i>
                                                                    </span>
                                            </a>
                                        </div>
                                    </div>
                                </x-admin.card>

                                <x-admin.card>
                                    <h5 class="card-title mb-4">Skills</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Photoshop</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">illustrator</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                    </div>
                                </x-admin.card>

                                <x-admin.card>
                                    <div class="d-flex align-items-center mb-4">
                                        <div class="flex-grow-1">
                                            <h5 class="card-title mb-0">{{ __('Activity Logs') }}</h5>
                                        </div>
                                    </div>
                                    @if($user->lastLoginAt())
                                    <div>
                                        <div class="d-flex align-items-center py-3">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="{{ asset('admins/assets/images/users/avatar-3.jpg') }}" alt="{{ $user->name }}" class="img-fluid rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="fs-14 mb-1">{{ __('Last login at') }}</h5>
                                                    <p class="fs-13 text-muted mb-0">{{ DateHelper::dateFormat($user->lastLoginAt()) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        @if($user->previousLoginAt())
                                        <div class="d-flex align-items-center py-3">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="{{ asset('admins/assets/images/users/avatar-4.jpg') }}" alt="" class="img-fluid rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="fs-14 mb-1">{{ __('Previous login at') }}</h5>
                                                    <p class="fs-13 text-muted mb-0"> {{ DateHelper::dateFormat($user->previousLoginAt()) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </x-admin.card>
                            </div>

                            <div class="col-xxl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ __('About') }}</h5>
                                        <p>Hi I'm Anna Adame, It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</p>
                                        <p>You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you’re working with reputable font websites. This may be the most commonly encountered tip I received from the designers I spoke with. They highly encourage that you use different fonts in one design, but do not over-exaggerate and go overboard.</p>
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
