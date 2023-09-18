<div>
    <livewire:admin.user.modules.cover-image :user="$user" lazy></livewire:admin.user.modules.cover-image>

    <div class="row">
        <div class="col-xxl-3">
            <x-admin.card
                class="mt-n5">
                <div class="text-center">
                    <livewire:admin.user.modules.avatar :user="$user" lazy></livewire:admin.user.modules.avatar>
                </div>
            </x-admin.card>
        </div>

        <div class="col-xxl-9">
            <x-admin.card
                :header="__('Personal Detail')"
                class="mt-xxl-n5"
            >
                <livewire:admin.user.modules.personal-detail :user="$user" lazy></livewire:admin.user.modules.personal-detail>

                @can('permission-edit')
                    <div
                        class="col-lg-12"
                        wire:click="showPermission">

                        <div class="hstack gap-2 justify-content-start">
                            <p
                                style="cursor: pointer"
                                class="link-info">{{ $show === true ? __('Click here to hide permissions') : __('Click here to show permissions') }}</p>
                        </div>
                    </div>

                    @if($show === true)
                        <livewire:admin.user.modules.personal-permission :user="$user" lazy></livewire:admin.user.modules.personal-permission>
                    @endif
                @endcan
            </x-admin.card>

            <x-admin.card
                :header="__('Address')"
            >
                @foreach($addresses as $address)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Education')"
            >
                @foreach($educations as $education)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Experience')"
            >
                @foreach($experiences as $experience)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Skill')"
            >
                @foreach($skills as $skill)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Certificate')"
            >
                @foreach($certificates as $certificate)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Award')"
            >
                @foreach($awards as $award)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Course')"
            >
                @foreach($courses as $course)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Projects')"
            >
                @foreach($projects as $project)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Product')"
            >
                @foreach($products as $product)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>

            <x-admin.card
                :header="__('Social Activity')"
            >
                @foreach($socialActivities as $socialActivity)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
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
            </x-admin.card>
        </div>
    </div>
</div>
