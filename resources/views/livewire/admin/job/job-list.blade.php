<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0"
                        role="tablist">
                        <li class="nav-item">
                            <span
                                wire:click="filterByType('all')"
                                style="cursor: pointer;"
                                class="nav-link {{ $filterType == 'all' ? 'active' : '' }} fw-semibold"
                                data-bs-toggle="tab"
                                role="tab">{{ __('All') }}<span
                                    class="badge badge-soft-danger align-middle rounded-pill ms-1"> {{ $totalJobs }}</span>
                            </span>
                        </li>

                        <li class="nav-item">
                            <span
                                wire:click="filterByType('show')"
                                style="cursor: pointer;"
                                class="nav-link fw-semibold {{ $filterType == 'show' ? 'active' : '' }}"
                                data-bs-toggle="tab"
                                role="tab">{{ __('Published') }}<span
                                    class="badge badge-soft-danger align-middle rounded-pill ms-1"> {{ $publishedJobs }}</span>
                            </span>
                        </li>

                        <li class="nav-item">
                            <span
                                wire:click="filterByType('hide')"
                                style="cursor: pointer;"
                                class="nav-link fw-semibold {{ $filterType == 'hide' ? 'active' : '' }}"
                                data-bs-toggle="tab"
                                role="tab">{{ __('Hide') }}<span
                                    class="badge badge-soft-danger align-middle rounded-pill ms-1"> {{ $hiddenJobs }}</span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <div id="selection-element">
                        <div class="my-n1 d-flex align-items-center text-muted">
                            Select <div id="select-content"
                                        class="text-body fw-semibold px-1"></div> Result <button
                                type="button" class="btn btn-link link-danger p-0 ms-3"
                                data-bs-toggle="modal"
                                data-bs-target="#removeItemModal">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('job-create')
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <div>
                    <x-link
                        :to="route('job.create')"
                        class="btn btn-primary">
                        <i class="ri-add-line align-bottom me-1"></i>{{ __('Add Job') }}</x-link>
                </div>
            </div>
        </div>
    @endcan

    <div class="row">
        @foreach($jobs as $job)
            <div class="col-xxl-3 col-sm-6">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h5 title="{{ $job->name }}" class="fs-15 mb-1 rex">{!! Str::limit($job->name, 30) !!}</h5>
                            </div>
                            <div class="d-inline-block">
                                    <span class="badge badge-soft-warning">
                                    <x-link
                                        :to="route('job.edit', ['id' => $job->id])"
                                        class="link-warning"
                                    >{{ __('Edit') }}</x-link></span>
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
                            <h6 class="flex-shrink-0 text-success mb-0"><i class="ri-time-line align-bottom"></i> {{ __('Updated :updatedAt', ['updatedAt' => BaseHelper::dateFormatForHumans($job->updated_at)]) }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(! $jobs->count())
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    {{ $jobs->onEachSide(0)->links() }}
</div>
