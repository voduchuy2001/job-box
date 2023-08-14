<div>
    <div class="card">
        <div class="card-header border-0 rounded">
            <div class="row g-2">
                <div class="col-xxl-3">
                    <div class="search-box">
                        <input type="text" class="form-control search" placeholder="{{ __('Search for users & company name or something...') }}"> <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        @foreach($users as $user)
            <div class="col-xl-3 col-lg-6">
                <div class="card ribbon-box right overflow-hidden">
                    <div class="card-body text-center p-4">
                        <div class="ribbon ribbon-info ribbon-shape trending-ribbon"><i class="ri-flashlight-fill text-white align-bottom"></i> <span class="trending-ribbon-text">{{ $user->auth_type === 'github' ? 'Github' : 'Email' }}</span></div>

                        <img src="{{ asset('admins/assets/images/companies/img-1.png') }}" alt="" height="45">

                        <h5 class="mb-1 mt-4"><a href="apps-ecommerce-seller-details.html" class="link-primary">{{ $user->name }}</a></h5>

                        <div class="mt-4">
                            <x-link
                                to="apps-ecommerce-seller-details.html"
                                class="btn btn-light w-100">{{ __('View Details') }}</x-link>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
