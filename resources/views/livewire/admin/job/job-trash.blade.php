<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row">
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
                            <div>
                                <span
                                    data-bs-toggle="modal"
                                    data-bs-target="#job-setting"
                                    wire:click="editJob({{ $job->id }})"
                                    style="cursor: pointer"
                                    class="badge badge-soft-warning">{{ __('Edit') }}</span>
                                <span
                                    wire:click="deleteJob({{ $job->id }})"
                                    style="cursor: pointer"
                                    class="badge badge-soft-danger">{{ __('Delete') }}</span>
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
</div>
