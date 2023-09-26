<div>
    <div class="page-content">
        <div class="container-fluid mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <x-form class="vertical-navs-step">
                                <div class="row gy-5">
                                    <div class="col-lg-3">
                                        <div class="nav flex-column custom-nav nav-pills">
                                            <span class="nav-link {{ $step === 1 ? 'active' : '' }} {{ $step > 1 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step 1') }}
                                                        </span>
                                                {{ __('Basic') }}
                                            </span>

                                            <span class="nav-link {{ $step === 2 ? 'active' : '' }} {{ $step > 2 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step 2') }}
                                                        </span>
                                                {{ __('Info') }}
                                            </span>

                                            <span class="nav-link {{ $step === 3 ? 'active' : '' }} {{ $step > 3 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step 3') }}
                                                        </span>
                                                {{ __('Finish') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div class="px-lg-4">
                                            <div class="tab-content">
                                                <div class="tab-pane fade {{ $step === 1 ? 'show active' : '' }}">
                                                    <div>
                                                        <h5>{{ __('Your Profile') }}</h5>
                                                        <p class="text-muted">{{ __('Fill all information below') }}</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="firstName"
                                                                    name="firstName"
                                                                    model="firstName"
                                                                    :label="__('First Name')"
                                                                    :placeholder="__('Enter first name')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="lastName"
                                                                    name="lastName"
                                                                    model="lastName"
                                                                    :label="__('Last Name')"
                                                                    :placeholder="__('Enter last name')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="studentId"
                                                                    name="studentId"
                                                                    model="studentId"
                                                                    :label="__('Student ID')"
                                                                    :placeholder="__('Enter student ID')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="major"
                                                                    name="major"
                                                                    model="major"
                                                                    :label="__('Major')"
                                                                    :placeholder="__('Enter major')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="course"
                                                                    name="course"
                                                                    model="course"
                                                                    :label="__('Course')"
                                                                    :placeholder="__('Enter course')"
                                                                ></x-input>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 1 }})"
                                                            type="button"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Next Step') }}</x-button>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade {{ $step === 2 ? 'show active' : '' }}">
                                                    <div>
                                                        <h5>{{ __('Your Address')  }}</h5>
                                                        <p class="text-muted">{{ __('Fill all information below') }}</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="email"
                                                                    name="email"
                                                                    model="email"
                                                                    :label="__('Email')"
                                                                    :placeholder="__('Enter email')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="phone"
                                                                    name="phone"
                                                                    model="phone"
                                                                    :label="__('Phone')"
                                                                    :placeholder="__('Enter phone')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-12">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="appliedPosition"
                                                                    name="appliedPosition"
                                                                    model="appliedPosition"
                                                                    :label="__('Applied Position')"
                                                                    :placeholder="__('Enter applied position')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-12">
                                                                <x-input.textarea
                                                                    class="form-control"
                                                                    rows="7"
                                                                    name="career"
                                                                    model="career"
                                                                    id="career"
                                                                    :label="__('Career')"
                                                                    :placeholder="__('Enter career')"
                                                                ></x-input.textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 0 }})"
                                                            type="button"
                                                            class="btn btn-light btn-label">
                                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                            {{ __('Previous Step') }}</x-button>

                                                        <x-button
                                                            wire:click="updateStep({{ 1 }})"
                                                            type="button"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Next Step') }}</x-button>                                                    </div>
                                                </div>

                                                <div class="tab-pane fade {{ $step === 3 ? 'show active' : '' }}">
                                                    <div class="text-center pt-4 pb-2">
                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>{{ __('Your Profile is Completed !') }}</h5>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 0 }})"
                                                            type="button"
                                                            class="btn btn-light btn-label">
                                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                            {{ __('Previous Step') }}</x-button>

                                                        <x-button
                                                            type="button"
                                                            wire:click="saveProfile"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <span class="d-flex align-items-center">
                                                                <i wire:loading
                                                                   wire:loading.attr="disabled"
                                                                   class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                                                                <span class="flex-grow-1 ms-2">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Save To Continue') }}</span>
                                                            </span></x-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
