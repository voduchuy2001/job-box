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
                            <div class="text-center">
                                <livewire:admin.user.modules.avatar :user="$user"></livewire:admin.user.modules.avatar>
                                <h5 class="fs-16 mb-1">{{ Auth::user()->name }}</h5>
                                <span class="d-flex align-items-center">
                                    <span class="flex-grow-1 ms-2">
                                        <button
                                            wire:click="downloadResume({{ Auth::id() }})"
                                            class="btn btn-soft-info">
                                                <i wire:loading
                                                   wire:loading.attr="disabled"
                                                   class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                                                <i wire:loading.attr="hidden"
                                                   class="ri-download-2-line align-bottom me-1"></i>
                                                {{ __('Download Resume') }}
                                        </button>

                                        <a
                                            target="_blank"
                                            href="{{ route('user-resume-preview.user', ['id' => $user->id]) }}"
                                            class="btn btn-soft-warning"
                                        ><i
                                            class="ri-eye-2-line align-bottom me-1"></i>{{ __('Preview') }}</a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <x-admin.card>
                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-address')"
                            >{{ __('New Address') }}</x-button>

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

                            @if($user->addresses->count() > $limits['addresses'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('addresses')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $addresses->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-address"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Address') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-address></livewire:user.user.modules.user-address>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-experience')"
                            >{{ __('New Experience') }}</button>

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

                            @if($user->experiences->count() > $limits['experiences'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('experiences')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $experiences->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-experience"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Experience') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-experience></livewire:user.user.modules.user-experience>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-education')"
                            >{{ __('Add Education') }}</x-button>

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
                                    <p class="list-text mb-0 fs-12">{{ __('Majors: :majors, start at: :startAt, end at: :endAt, Description: :description', ['majors' => $education->majors, 'startAt' => $education->start_at, 'endAt' => $education->end_at ?: __('Undefined'), 'description' => $education->description]) }}</p>
                                </div>
                            </div>
                        </span>
                                </div>
                            @endforeach

                            @if($user->educations->count() > $limits['educations'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('educations')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $educations->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-education"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Education') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-education></livewire:user.user.modules.user-education>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-skill')"
                            >{{ __('New Skill') }}</x-button>

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

                            @if($user->skills->count() > $limits['skills'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('skills')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $skills->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-skill"
                                type="modal-md modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Skill') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-skill></livewire:user.user.modules.user-skill>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-certificate')"
                            >{{ __('New Certificate') }}</x-button>

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

                            @if($user->certificates->count() > $limits['certificates'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('certificates')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $certificates->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-certificate"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Certificate') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-certificate></livewire:user.user.modules.user-certificate>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-award')"
                            >{{ __('New Award') }}</x-button>

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

                            @if($user->awards->count() > $limits['awards'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('awards')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $awards->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-award"
                                type="modal-md modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Award') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-award></livewire:user.user.modules.user-award>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-course')"
                            >{{ __('New Course') }}</x-button>

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
                                    <h5 class="list-title fs-15 mb-1">{{ __('Course: :course', ['course' => $course->name]) }}</h5>
                                    <p class="list-text mb-0 fs-12">{{ __('Organization: :organization, Start at: :startAt, End at: :endAt, Description: :description', ['organization' => $course->organization, 'startAt' => $course->start_at, 'endAt' => $course->end_at ?: __('Undefined'), 'description' => $course->description]) }}</p>
                                </div>
                            </div>
                        </span>
                                </div>
                            @endforeach

                            @if($user->courses->count() > $limits['courses'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('courses')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $courses->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-course"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Course') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-course></livewire:user.user.modules.user-course>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-project')"
                            >{{ __('New Project') }}</x-button>

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

                            @if($user->projects->count() > $limits['projects'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('projects')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $projects->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-project"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Project') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-project></livewire:user.user.modules.user-project>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-product')"
                            >{{ __('New Product') }}</x-button>

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

                            @if($user->products->count() > $limits['products'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('products')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $products->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-product"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Product') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-product></livewire:user.user.modules.user-product>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>

                        <div class="mb-3">
                            <x-button
                                type="button"
                                class="btn btn-primary mb-3"
                                onclick="showModal('new-social-activity')"
                            >{{ __('New Social Activity') }}</x-button>

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
                                    <p class="list-text mb-0 fs-12">{{ __('Position: :position, Start at: :startAt, End at: :endAt, Description: :description', ['position' => $socialActivity->position, 'startAt' => $socialActivity->start_at, 'endAt' => $socialActivity->end_at ?: __('Undefined'), 'description' => $socialActivity->description]) }}</p>
                                </div>
                            </div>
                        </span>
                                </div>
                            @endforeach

                            @if($user->socialActivities->count() > $limits['socialActivities'])
                                <div class="form-group mt-3">
                                    <div class="text-center">
                                        <x-button
                                            wire:click="loadMore('socialActivities')"
                                            class="btn btn-primary"
                                            type="button"
                                        >{{ __('Load more') }}</x-button>
                                    </div>
                                </div>
                            @endif

                            @if(! $socialActivities->count())
                                <x-admin.empty></x-admin.empty>
                            @endif

                            <x-admin.modal
                                id="new-social-activity"
                                type="modal-lg modal-dialog-centered">
                                <x-admin.modal.header>{{ __('New Social Activity') }}</x-admin.modal.header>
                                <x-admin.modal.body>
                                    <livewire:user.user.modules.user-social-activity></livewire:user.user.modules.user-social-activity>
                                </x-admin.modal.body>
                            </x-admin.modal>
                        </div>
                    </x-admin.card>
                </div>
            </div>
        </div>
    </div>
</div>
