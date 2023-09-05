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
                >{{ __('Click Here To Create New') }}</x-button>

                <x-admin.table :labels="[__('ID'), __('Address')]"
                >
                    @foreach($addresses as $key => $address)
                        <tr>
                            <td class="fw-medium">{{ $key + 1 }}</td>
                            <td>{{ $address->name }}</td>
                            <td>
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
                            </td>
                        </tr>
                    @endforeach
                </x-admin.table>
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
</div>
