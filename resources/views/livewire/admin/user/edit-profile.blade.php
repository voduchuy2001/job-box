@php use App\Enums\UserRole;use App\Enums\UserStatus; @endphp
<div>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            @if($coverImage)
                <img src="{{ $coverImage->temporaryUrl() }}" class="profile-wid-img" alt="">
            @else
                <img
                    src="{{ $user->coverImage === null ? asset('admins/assets/images/profile-bg.jpg') : asset($user->coverImage->url) }}"
                    class="profile-wid-img" alt="">
            @endif
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <x-admin.input
                            id="profile-foreground-img-file-input"
                            type="file"
                            class="profile-foreground-img-file-input"
                            name="coverImage"
                            model="coverImage"
                            accept="image/*"></x-admin.input>
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> {{ __('Change Cover') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <x-admin.card
                class="mt-n5">
                <div class="text-center">
                    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
                        @if($avatar)
                            <img src="{{ $avatar->temporaryUrl() }}"
                                 class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                 alt="user-profile-image">
                        @else
                            <img
                                src="{{ $user->avatar === null ? asset('admins/assets/images/users/avatar-1.jpg') : asset($user->avatar->url) }}"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                alt="user-profile-image">
                        @endif
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <x-admin.input
                                class="profile-img-file-input"
                                id="profile-img-file-input"
                                type="file"
                                accept="image/*"
                                name="avatar"
                                model="avatar"
                            ></x-admin.input>

                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                            </label>
                        </div>
                    </div>
                    <h5 class="fs-16 mb-1">{{ $user->name }}</h5>
                    <p class="text-muted mb-0">{{ $user->role->name }}</p>
                </div>
            </x-admin.card>
        </div>

        <x-admin.alert></x-admin.alert>

        <div class="col-xxl-9">
            <x-admin.card
                class="mt-xxl-n5"
            >
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> {{ __('Personal Details') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                <i class="far fa-envelope"></i> {{ __('Experience') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form wire:submit.prevent="updateProfile">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <x-admin.input
                                            :label="__('Full Name')"
                                            class="form-control"
                                            type="name"
                                            id="name"
                                            name="name"
                                            model="name"
                                            placeholder="{{ __('Enter name') }}"
                                        ></x-admin.input>
                                    </div>

                                    <div class="col-lg-6">
                                        <x-admin.input
                                            :label="__('Email')"
                                            class="form-control"
                                            type="email"
                                            id="email"
                                            name="email"
                                            model="email"
                                            readonly
                                            disabled
                                        ></x-admin.input>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">{{ __('Status') }}</label>
                                        <select class="form-select mb-3" wire:model="userStatus">
                                            <option value="{{ UserStatus::IsActive }}">{{ UserStatus::IsActive }}</option>
                                            <option value="{{ UserStatus::Blocked }}">{{ UserStatus::Blocked }}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="form-label">{{ __('Role') }}</label>
                                        <select class="form-select mb-3" wire:model="userRole">
                                            <option value="{{ UserRole::Admin }}">{{ UserRole::Admin }}</option>
                                            <option value="{{ UserRole::User }}">{{ UserRole::User }}</option>
                                            <option value="{{ UserRole::Company }}">{{ UserRole::Company }}</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <x-button
                                                type="submit"
                                                class="btn btn-primary">{{ __('Updates') }}</x-button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="experience" role="tabpanel">
                            <form>
                                <div id="newlink">
                                    <div id="1">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobTitle" class="form-label">Job Title</label>
                                                    <input type="text" class="form-control" id="jobTitle"
                                                           placeholder="Job title" value="Lead Designer / Developer">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="companyName"
                                                           placeholder="Company name" value="Themesbrand">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="experienceYear" class="form-label">Experience
                                                        Years</label>
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices
                                                                    data-choices-search-false name="experienceYear"
                                                                    id="experienceYear">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17" selected>2017</option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20">2020</option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-auto align-self-center">
                                                            to
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-5">
                                                            <select class="form-control" data-choices
                                                                    data-choices-search-false
                                                                    name="choices-single-default2">
                                                                <option value="">Select years</option>
                                                                <option value="Choice 1">2001</option>
                                                                <option value="Choice 2">2002</option>
                                                                <option value="Choice 3">2003</option>
                                                                <option value="Choice 4">2004</option>
                                                                <option value="Choice 5">2005</option>
                                                                <option value="Choice 6">2006</option>
                                                                <option value="Choice 7">2007</option>
                                                                <option value="Choice 8">2008</option>
                                                                <option value="Choice 9">2009</option>
                                                                <option value="Choice 10">2010</option>
                                                                <option value="Choice 11">2011</option>
                                                                <option value="Choice 12">2012</option>
                                                                <option value="Choice 13">2013</option>
                                                                <option value="Choice 14">2014</option>
                                                                <option value="Choice 15">2015</option>
                                                                <option value="Choice 16">2016</option>
                                                                <option value="Choice 17">2017</option>
                                                                <option value="Choice 18">2018</option>
                                                                <option value="Choice 19">2019</option>
                                                                <option value="Choice 20" selected>2020</option>
                                                                <option value="Choice 21">2021</option>
                                                                <option value="Choice 22">2022</option>
                                                            </select>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="jobDescription" class="form-label">Job
                                                        Description</label>
                                                    <textarea class="form-control" id="jobDescription" rows="3"
                                                              placeholder="Enter description">You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you're working with reputable font websites. </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="newForm" style="display: none;">

                                </div>
                                <div class="col-lg-12">
                                    <div class="hstack gap-2">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="javascript:new_link()" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </x-admin.card>
        </div>
    </div>
</div>
