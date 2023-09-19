<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <x-admin.card>
                        <div class="card-header">
                            <div class="filter-choices-input">
                                <input
                                    id="searchTerm"
                                    name="searchTerm"
                                    wire:model.live.debounce.1000ms="searchTerm"
                                    class="form-control"
                                    placeholder="{{ __('Find your job...') }}" />
                            </div>
                        </div>

                        <div class="accordion accordion-flush filter-accordion">
                            <div class="card-body border-bottom">
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-3">{{ __('Categories') }}</p>
                                @foreach($categories as $key => $category)
                                    <div class="form-check">
                                        <input
                                            name="filterByCategory"
                                            wire:model.live.debounce.1000ms="filterByCategory"
                                            class="form-check-input"
                                            type="checkbox"
                                            value="{{ $category->id }}"
                                            id="{{ $category->id }}">
                                        <label class="form-check-label" for="{{ $category->id }}">
                                            {!! __(':categoryName :count', ['categoryName' => $category->name, 'count' => '<span class="badge bg-light text-muted">' . $category->jobs->count() . '</span>']) !!}
                                        </label>
                                    </div>
                                @endforeach

                                @if(! $categories->count())
                                    <x-admin.empty></x-admin.empty>
                                @endif
                            </div>

                            <div class="card-body border-bottom">
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-4">{{ __('Salary') }}</p>

                                <div id="product-price-range"></div>
                                <div class="formCost d-flex gap-2 align-items-center mt-3">
                                    <input
                                        class="form-control form-control-sm"
                                        type="number"
                                        id="salaryMin"
                                        name="salaryMin"
                                        placeholder="{{ __(':min VND', ['min' => 1000000]) }}"
                                        wire:model.live.debounce.1000ms="salaryMin"
                                    />

                                    <span class="fw-semibold text-muted"> - </span>

                                    <input
                                        class="form-control form-control-sm"
                                        type="number"
                                        id="salaryMax"
                                        name="salaryMax"
                                        placeholder="{{ __(':min VND', ['min' => 100000000]) }}"
                                        wire:model.live.debounce.1000ms="salaryMax"
                                    />
                                </div>
                            </div>

                            <div class="accordion-item" wire:ignore>
                                <h2 class="accordion-header" id="flush-headingType">
                                    <button class="accordion-button bg-transparent shadow-none collapsed"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseType" aria-expanded="true"
                                            aria-controls="flush-collapseType">
                                        <span class="text-muted text-uppercase fs-12 fw-medium">{{ __('Type') }}</span>
                                        <span
                                            class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                    </button>
                                </h2>
                                <div id="flush-collapseType" class="accordion-collapse collapse"
                                     aria-labelledby="flush-headingType">
                                    <div class="accordion-body text-body pt-1">
                                        <div class="d-flex flex-column gap-2 filter-check">
                                            <div class="form-check">
                                                <input
                                                    name="filterByCategory"
                                                    wire:model.live.debounce.1000ms="filterByType"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Full Time"
                                                    id="Full Time">
                                                <label class="form-check-label" for="Full Time">
                                                    {{ __('Full Time') }}
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input
                                                    name="filterByCategory"
                                                    wire:model.live.debounce.1000ms="filterByType"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Part Time"
                                                    id="Part Time">
                                                <label class="form-check-label" for="Part Time">
                                                    {{ __('Part Time') }}
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input
                                                    name="filterByCategory"
                                                    wire:model.live.debounce.1000ms="filterByType"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Freelance"
                                                    id="Freelance">
                                                <label class="form-check-label" for="Freelance">
                                                    {{ __('Freelance') }}
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input
                                                    name="filterByCategory"
                                                    wire:model.live.debounce.1000ms="filterByType"
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    value="Internship"
                                                    id="Internship">
                                                <label class="form-check-label" for="Internship">
                                                    {{ __('Internship') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-admin.card>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-lg-6" wire:key="job-list-{{ $job->id }}">
                                <livewire:user.job.job-item :job="$job" wire:key="job-item-{{ $job->id }}"></livewire:user.job.job-item>
                            </div>
                        @endforeach

                        @if(! $jobs->count())
                            <div class="col-lg-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <x-admin.empty></x-admin.empty>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{ $jobs->onEachSide(0)->links() }}

                        <div class="text-center my-2" wire:loading>
                            <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
