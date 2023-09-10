<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <x-admin.card>
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <div>
                    <x-button
                        type="button"
                        data-bs-target="#create-role-permission"
                        data-bs-toggle="modal"
                        class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i> Add Role</x-button>
                </div>
            </div>
        </div>

        <x-admin.table
            :labels="[__('Id'), __('Name'), __('Permission')]"
        >
            @foreach($roles as $key => $role)
                <tr>
                    <td class="fw-medium">{{ $key + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach($role->permissions as $permission)
                            <span class="badge badge-soft-primary">
                                {{ $permission->name }}
                            </span>
                        @endforeach
                    </td>
                    <td>
                        <div class="hstack gap-3 fs-15">
                            @if($confirm == $role->id)
                                <span
                                    wire:click="delete({{ $role->id }})"
                                    style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                <span
                                    wire:click="confirmDelete({{ $role->id }})"
                                    style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                            @else
                                <span
                                    wire:click="confirmDelete({{ $role->id }})"
                                    style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-admin.table>

        @if(! count($roles))
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        @endif
    </x-admin.card>
    <x-admin.modal
        id="create-role-permission"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ __('New Role') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.role-permission.create-role></livewire:admin.role-permission.create-role>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
