<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

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
</div>
