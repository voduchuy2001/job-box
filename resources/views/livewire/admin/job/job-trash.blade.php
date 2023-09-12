<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row">
        <div class="col-md-12 mb-4">
            <button
                data-bs-toggle="modal"
                data-bs-target="#clean-data"
                class="btn btn-warning">{{ __('Clean Data') }}</button>
        </div>
        @foreach($jobs as $job)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-shrink-0 avatar-sm">
                                <div class="avatar-title bg-light rounded">
                                    <img src="{{ $job->user->avatar->url != null ? asset($job->user->avatar->url) : asset('assets/images/users/avatar-3.jpg') }}" alt="{{ $job->name }}" class="avatar-xxs" />
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-15 mb-1">{{ $job->name }}</h5>
                                <p class="text-muted mb-2">{!! Str::limit($job->description, 50) !!}</p>
                            </div>
                        </div>
                        <h6 class="text-muted mb-0">{{ __('From :from to :to', ['from' => BaseHelper::moneyFormat($job->min_salary), 'to' => BaseHelper::moneyFormat($job->max_salary)]) }}</h6>
                    </div>
                    <div class="card-body border-top border-top-dashed">
                        <div class="d-flex">
                            <h6 class="flex-shrink-0 text-success mb-0"><i class="ri-time-line align-bottom"></i> {{ __('Updated :updatedAt', ['updatedAt' => $job->updated_at->diffForHumans()]) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $jobs->links() }}

    @if(! count($jobs))
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    <x-admin.modal
        id="clean-data"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.body>
            <div class="mt-2 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                           colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                    <h4>{{ __('Warning') }}</h4>
                    <p class="text-muted mx-4 mb-0">{{ __('Are you sure you want to clean this data?') }}</p>
                </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <x-button
                    wire:click="cleanData"
                    class="btn w-sm btn-danger">{{ __('Yes, Delete It!') }}</x-button>
            </div>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
