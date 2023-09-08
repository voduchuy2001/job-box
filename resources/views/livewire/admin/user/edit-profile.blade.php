<div>
    <livewire:admin.user.modules.cover-image :user="$user"></livewire:admin.user.modules.cover-image>

    <div class="row">
        <div class="col-xxl-3">
            <x-admin.card
                class="mt-n5">
                <div class="text-center">
                    <livewire:admin.user.modules.avatar :user="$user"></livewire:admin.user.modules.avatar>
                </div>
            </x-admin.card>
        </div>

        <div class="col-xxl-9">
            <x-admin.card
                :header="__('Personal Detail')"
                class="mt-xxl-n5"
            >
                <livewire:admin.user.modules.personal-detail :user="$user"></livewire:admin.user.modules.personal-detail>
            </x-admin.card>

            <x-admin.card
                :header="__('Address')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-address"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($addresses as $address)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $address->id && $confirmType == 'address')
                                    <span
                                        wire:click="delete({{ $address->id }}, 'address')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $address->id }}, 'address')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $address->id }}, 'address')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __(':houseNumber', ['houseNumber' => $address->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __(':ward, :district, :province', ['ward' => $address->ward->name, 'district' => $address->district->name, 'province' => $address->province->name]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userAddresses > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($addresses))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Experience')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-experience"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($experiences as $experience)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $experience->id && $confirmType == 'experience')
                                    <span
                                        wire:click="delete({{ $experience->id }}, 'experience')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $experience->id }}, 'experience')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $experience->id }}, 'experience')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Position: :position', ['position' => $experience->position]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Company: :company, start at: :startAt, end at: :endAt', ['company' => $experience->company_name, 'startAt' => $experience->start_at, 'endAt' => $experience->end_at ?: __('Undefined')]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userExperiences > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($educations))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Education')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-education"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($educations as $education)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $education->id && $confirmType == 'education')
                                    <span
                                        wire:click="delete({{ $education->id }}, 'education')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $education->id }}, 'education')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $education->id }}, 'education')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __(':school', ['school' => $education->school]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Majors: :majors, start at: :startAt, end at: :endAt', ['majors' => $education->majors, 'startAt' => $education->start_at, 'endAt' => $education->end_at ?: __('Undefined')]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userEducations > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($educations))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Skill')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-skill"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($skills as $skill)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $skill->id && $confirmType == 'skill')
                                    <span
                                        wire:click="delete({{ $skill->id }}, 'skill')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $skill->id }}, 'skill')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $skill->id }}, 'skill')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Skill: :skillName', ['skillName' => $skill->name]) }}</h5>
                                    @if($skill->description)
                                        <p class="list-text mb-0 fs-12">{{ __('Description: :description', ['description' => $skill->description]) }}</p>
                                    @endif
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userSkills > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($skills))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Certificate')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-certificate"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($certificates as $certificate)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $certificate->id && $confirmType == 'certificate')
                                    <span
                                        wire:click="delete({{ $certificate->id }}, 'certificate')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $certificate->id }}, 'certificate')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $certificate->id }}, 'certificate')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Certificate: :certificate', ['certificate' => $certificate->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Organization: :organization, Issued on: :issuedOn, Expires on: :expiresOn', ['organization' => $certificate->organization, 'issuedOn' => $certificate->issued_on, 'expiresOn' => $certificate->expires_on ?: __('Undefined')]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userCertificates > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($certificates))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Award')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-award"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($awards as $award)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $award->id && $confirmType == 'award')
                                    <span
                                        wire:click="delete({{ $award->id }}, 'award')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $award->id }}, 'award')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $award->id }}, 'award')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Award: :award', ['award' => $award->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Organization: :organization, Issued on: :issuedOn', ['organization' => $award->organization, 'issuedOn' => $award->issued_on]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userAwards > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($awards))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Projects')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-project"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($projects as $project)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $project->id && $confirmType == 'project')
                                    <span
                                        wire:click="delete({{ $project->id }}, 'project')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $project->id }}, 'project')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $project->id }}, 'project')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Project: :project', ['project' => $project->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Position: :position, Number of member: :numberOfMembers, Start at: :startAt, End at: :endAt, Technology: :technology, Description: :description', ['position' => $project->position, 'numberOfMembers' => $project->number_of_members, 'startAt' => $project->start_at, 'endAt' => $project->end_at ?: __('Undefined'), 'technology' => $project->technology, 'description' => $project->description]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userProjects > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($projects))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Course')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-course"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($courses as $course)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $course->id && $confirmType == 'course')
                                    <span
                                        wire:click="delete({{ $course->id }}, 'course')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $course->id }}, 'course')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $course->id }}, 'course')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Project: :project', ['project' => $course->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Position: :position, Number of member: :numberOfMembers, Start at: :startAt, End at: :endAt, Technology: :technology, Description: :description', ['position' => $course->position, 'numberOfMembers' => $course->number_of_members, 'startAt' => $course->start_at, 'endAt' => $course->end_at ?: __('Undefined'), 'technology' => $course->technology, 'description' => $course->description]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userCourses > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($courses))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Social Activity')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-social-activity"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($socialActivities as $socialActivity)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $socialActivity->id && $confirmType == 'socialActivity')
                                    <span
                                        wire:click="delete({{ $socialActivity->id }}, 'socialActivity')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $socialActivity->id }}, 'socialActivity')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $socialActivity->id }}, 'socialActivity')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Organization: :organization', ['organization' => $socialActivity->organization]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Position: :position, Start at: :startAt, End at: :endAt, Description: :description', ['position' => $socialActivity->position, 'startAt' => $socialActivity->start_at, 'endAt' => $socialActivity->end_at ?: __('Undefined'), 'technology' => $project->technology, 'description' => $project->description]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userSocialActivities > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($socialActivities))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>

            <x-admin.card
                :header="__('Product')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-product"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($products as $product)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $product->id && $confirmType == 'product')
                                    <span
                                        wire:click="delete({{ $product->id }}, 'product')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $product->id }}, 'product')"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $product->id }}, 'product')"
                                        style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                @endif
                            </div>
                            <div class="d-flex mb-2 align-items-center">
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="list-title fs-15 mb-1">{{ __('Product: :product', ['product' => $product->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Type: :type, Completion time: :completionTime, Description: :description', ['type' => $product->type, 'completionTime' => $product->completion_time, 'description' => $product->description]) }}</p>
                                </div>
                            </div>
                        </span>
                    </div>
                @endforeach

                @if($userProducts > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button
                                wire:click="loadMore"
                                class="btn btn-primary"
                                type="button"
                            >{{ __('Load more') }}</x-button>
                        </div>
                    </div>
                @endif

                @if(! count($products))
                    <x-admin.empty></x-admin.empty>
                @endif
            </x-admin.card>
        </div>
    </div>

    <x-admin.modal
        id="new-address"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Address') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-address :user="$user"></livewire:admin.user.modules.personal-address>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-experience"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Experience') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-experience :user="$user"></livewire:admin.user.modules.personal-experience>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-education"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Education') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-education :user="$user"></livewire:admin.user.modules.personal-education>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-skill"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Skill') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-skill :user="$user"></livewire:admin.user.modules.personal-skill>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-certificate"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Certificate') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-certificate :user="$user"></livewire:admin.user.modules.personal-certificate>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-award"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Award') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-award :user="$user"></livewire:admin.user.modules.personal-award>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-project"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Project') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-project :user="$user"></livewire:admin.user.modules.personal-project>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-course"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Course') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-course :user="$user"></livewire:admin.user.modules.personal-course>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-social-activity"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Social Activity') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-social-activity :user="$user"></livewire:admin.user.modules.personal-social-activity>
        </x-admin.modal.body>
    </x-admin.modal>

    <x-admin.modal
        id="new-product"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Product') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-product :user="$user"></livewire:admin.user.modules.personal-product>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
