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
                    wire:click="changeType"
                    type="button"
                    data-bs-target="#job-setting"
                    data-bs-toggle="modal"
                    class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i>{{ __('Add Job') }}</x-button>
            </div>
        </div>
    </div>

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
                                <p class="text-muted mb-2">{!! $job->description !!}</p>
                            </div>
                            <div>
                                <a href="javascript:void(0);" class="badge badge-soft-{{ $job->status == 'still recruiting' ? 'success' : 'dark' }}">{{ $job->status }}<i class="ri-arrow-right-up-line align-bottom"></i></a>
                            </div>
                        </div>
                        <h6 class="text-muted mb-0">{{ __('From :from to :to VND', ['from' => number_format($job->salary->min), 'to' => number_format($job->salary->max)]) }}</h6>
                    </div>
                    <div class="card-body border-top border-top-dashed">
                        <div class="d-flex">
                            <h6 class="flex-shrink-0 text-danger mb-0"><i class="ri-time-line align-bottom"></i> {{ __('Updated :updatedAt', ['updatedAt' => $job->updated_at->diffForHumans()]) }}</h6>
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
        <x-admin.modal.header>{{ $isEdit === true ? __('Edit Job') : __('New Job') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <x-form wire:submit.prevent="{{ $isEdit === true ? 'updateJob' : 'saveJob' }}">
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
                            <option value="more">{{ __('More') }}</option>
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
                            placeholder="{{ __('Enter min') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-4">
                        <x-admin.input
                            :label="__('Qualification')"
                            class="form-control"
                            type="text"
                            id="qualification"
                            name="qualification"
                            model="qualification"
                            placeholder="{{ __('Enter qualification') }}"
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
                            placeholder="{{ __('Enter max') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">{{ __('Provinces') }}</label>
                        <select class="form-select" wire:model.live="provinceId">
                            <option value="">{{ __('Choose Your Province') }}</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>

                        @error('provinceId')
                        <span class="text-danger">
                    {{ $message }}
                </span>
                        @enderror
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">{{ __('Districts') }}</label>
                        <select class="form-select" wire:model.live="districtId">
                            <option value="">{{ __('Choose A District') }}</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>

                        @error('districtId')
                        <span class="text-danger">
                    {{ $message }}
                </span>
                        @enderror
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label class="form-label">{{ __('Wards') }}</label>
                        <select class="form-select" wire:model.live="wardId">
                            <option value="">{{ __('Choose A Ward') }}</option>
                            @foreach($wards as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>

                        @error('wardId')
                        <span class="text-danger">
                    {{ $message }}
                </span>
                        @enderror
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
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
