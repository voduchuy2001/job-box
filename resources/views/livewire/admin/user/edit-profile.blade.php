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
                :header="__('Personal Details')"
                class="mt-xxl-n5"
            >
                <livewire:admin.user.modules.personal-detail :user="$user"></livewire:admin.user.modules.personal-detail>
            </x-admin.card>

            <x-admin.card
                :header="__('Addresses')"
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
                                 @if($confirm == $address->id)
                                    <span
                                        wire:click="delete({{ $address->id }})"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $address->id }})"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $address->id }})"
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

                @if(count($addresses) > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button wire:click="loadMore"
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
                :header="__('Education')"
            >
                <x-button
                    type="button"
                    class="btn btn-primary mb-3"
                    data-bs-target="#new-education"
                    data-bs-toggle="modal"
                >{{ __('Add New') }}</x-button>

                @foreach($addresses as $address)
                    <div class="list-group">
                        <span class="list-group-item list-group-item-action">
                            <div class="float-end">
                                 @if($confirm == $address->id)
                                    <span
                                        wire:click="delete({{ $address->id }})"
                                        style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                    <span
                                        wire:click="confirmDelete({{ $address->id }})"
                                        style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                @else
                                    <span
                                        wire:click="confirmDelete({{ $address->id }})"
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

                @if(count($addresses) > $limit)
                    <div class="form-group mt-3">
                        <div class="text-center">
                            <x-button wire:click="loadMore"
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
        id="new-education"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Education') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.modules.personal-education :user="$user"></livewire:admin.user.modules.personal-education>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
