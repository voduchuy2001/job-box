<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <x-button
                    type="button"
                    data-bs-target="#job-setting"
                    data-bs-toggle="modal"
                    class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i>{{ __('Quick Add') }}</x-button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($jobs as $job)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h5 title="{{ $job->name }}" class="fs-15 mb-1">{!! Str::limit($job->name, 30) !!}</h5>
                                <p title="{{ $job->description }}" class="text-muted mb-2">{!! Str::limit($job->description, 30) !!}</p>
                            </div>
                            <div class="d-flex">
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

    @if(! count($jobs))
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    <x-admin.modal
        id="job-setting"
        type="modal-xl modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Job') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <x-form wire:submit.prevent="saveJob">
                <div class="row">
                    <div class="col-lg-6">
                        <x-admin.input
                            :label="__('Job Name')"
                            class="form-control"
                            type="text"
                            id="name"
                            name="name"
                            model="name"
                            placeholder="{{ __('Enter name') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-6">
                        <x-admin.input
                            :label="__('Job Position')"
                            class="form-control"
                            type="text"
                            id="position"
                            name="position"
                            model="position"
                            placeholder="{{ __('Enter position') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Category') }}</label>
                        <select class="form-select mb-3" wire:model="category">
                            <option value="">{{ __('Choose An Option') }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">{{ __('Type') }}</label>
                        <select class="form-select mb-3" wire:model="type">
                            <option value="">{{ __('Choose An Option') }}</option>
                            <option value="Full Time">{{ __('Full Time') }}</option>
                            <option value="Part Time">{{ __('Part Time') }}</option>
                            <option value="Freelance">{{ __('Freelance') }}</option>
                            <option value="Internship">{{ __('Internship') }}</option>
                        </select>

                        @error('type')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <x-admin.editor
                            :label="__('Description')"
                            class="form-control"
                            type="text"
                            id="description"
                            name="description"
                            model="description"
                            rows="7"
                            placeholder="{{ __('Enter content') }}"
                        >
                        </x-admin.editor>
                    </div>

                    <div class="col-lg-4">
                        <x-admin.input
                            :label="__('No. of Vacancy')"
                            class="form-control"
                            type="number"
                            id="vacancy"
                            name="vacancy"
                            model="vacancy"
                            placeholder="{{ __('Enter vacancy') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">{{ __('Experiences') }}</label>
                        <select class="form-select mb-3" wire:model="experience">
                            <option value="">{{ __('Choose An Option') }}</option>
                            <option value="0">{{ __('0 Year') }}</option>
                            <option value="1">{{ __('1 Year') }}</option>
                            <option value="2">{{ __('2 Years') }}</option>
                            <option value="3">{{ __('3 Years') }}</option>
                            <option value="more">{{ __('More 3 Years') }}</option>
                        </select>

                        @error('experience')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <x-admin.datepicker
                            :label="__('Deadline For Filing')"
                            class="form-control"
                            type="text"
                            id="deadlineForFiling"
                            name="deadlineForFiling"
                            model="deadlineForFiling"
                        ></x-admin.datepicker>
                    </div>

                    <div class="col-lg-4">
                        <x-admin.input
                            :label="__('Salary Min')"
                            class="form-control"
                            type="number"
                            id="min"
                            name="min"
                            model="min"
                            placeholder="{{ __('Enter min (VND)') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-4">
                        <x-admin.input
                            :label="__('Salary Max')"
                            class="form-control"
                            type="number"
                            id="max"
                            name="max"
                            model="max"
                            placeholder="{{ __('Enter max (VND)') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">{{ __('Status') }}</label>
                        <select class="form-select mb-3" wire:model="status">
                            <option value="">{{ __('Choose An Option') }}</option>
                            <option value="show">{{ __('Show') }}</option>
                            <option value="hide">{{ __('Hide') }}</option>
                        </select>

                        @error('status')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <x-button
                                type="submit"
                                class="btn btn-primary">{{ __('Save Data') }}</x-button>
                        </div>
                    </div>
                </div>
            </x-form>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
