<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($companies as $company)
                        <div class="col-md-4 mt-4">
                            <div class="card-body text-center">
                                <div class="avatar-md mb-4 mx-auto">
                                    <img src="{{ $company->avatar != null ? asset($company->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" class="img-thumbnail rounded-circle shadow-none">
                                </div>

                                <h5 class="mb-0">{{ $company->profile->payload['name'] }}</h5>
                                <p class="text-muted">{{ __('Founded In: :in - :headquarters', ['in' => $company->profile->payload['founded'], 'headquarters' => $company->profile->payload['headquarters']]) }}</p>

                                <div class="d-flex gap-2 justify-content-center mb-3">
                                    <p>{{ __('Have :jobs job(s)', ['jobs' => $company->jobs_count]) }}</p>
                                </div>

                                <div>
                                    <x-link
                                        :to="route('company-detail.user', ['id' => $company->id])"
                                        class="btn btn-success w-100">
                                        {{ __('View Detail') }}</x-link>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if(! $companies->count())
                        <div class="col-lg-12">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <x-admin.empty></x-admin.empty>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{ $companies->onEachSide(0)->links() }}

                    <div class="text-center my-2" wire:loading>
                        <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
