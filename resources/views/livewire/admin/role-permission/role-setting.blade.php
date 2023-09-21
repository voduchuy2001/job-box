<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    @can('role-create')
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <div>
                    <x-button
                        wire:click="changeType"
                        type="button"
                        onclick="showModal()"
                        class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i>{{ __('Add Role') }}</x-button>
                </div>
            </div>
        </div>
    @endcan

    <x-admin.card>
        <x-admin.table
            :labels="[__('Id'), __('Name'), __('Permission')]"
        >
            @foreach($roles as $key => $role)
                <tr>
                    <td class="fw-medium">{{ $key + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <div class="text-break">
                            @foreach($role->permissions as $permission)
                                <div class="d-flex mb-1">
                                    <span
                                        class="badge badge-soft-success">
                                    {{ $permission->name }}
                                </span>
                                </div>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <div class="hstack gap-3 fs-15">
                              @can('role-edit')
                                <span
                                    onclick="showModal()"
                                    wire:click="editRole({{ $role->id }})"
                                    style="cursor: pointer" class="link-warning"><i class="ri-pencil-line"></i></span>

                                @endcan
                                    @can('role-delete')
                                      @if($confirm == $role->id)
                                          <span
                                              wire:click="deleteRole({{ $role->id }})"
                                              style="cursor: pointer" class="link-danger"><i class="ri-check-line"></i></span>
                                          <span
                                              wire:click="confirmDelete({{ $role->id }})"
                                              style="cursor: pointer" class="link-warning"><i class="ri-close-line"></i></span>
                                      @else
                                          <span
                                              wire:click="confirmDelete({{ $role->id }})"
                                              style="cursor: pointer" class="link-danger"><i class="ri-delete-bin-line"></i></span>
                                      @endif
                                  @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-admin.table>


        @if(! $roles->count())
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        @endif
    </x-admin.card>

    {{ $roles->onEachSide(0)->links() }}

    <x-admin.modal
        id="setting-role-permission"
        type="modal-lg modal-dialog-centered">
        <x-admin.modal.header>{{ $isEdit === true ? __('Edit Role') : __('New Role') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <x-form wire:submit.prevent="{{ $isEdit === true ? 'updateRole' : 'saveRole' }}">
                <div class="row">
                    <div class="col-lg-12">
                        <x-admin.input
                            :label="__('Role Name')"
                            class="form-control"
                            type="text"
                            id="name"
                            name="name"
                            model="name"
                            placeholder="{{ __('Enter name') }}"
                        ></x-admin.input>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            @foreach($permissions as $key => $permission)
                                <div class="col-lg-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            name="roleHasPermissions"
                                            wire:model="roleHasPermissions"
                                            type="checkbox"
                                            value="{{ $permission->id }}"
                                            id="{{ $permission->name }}"
                                            checked
                                        >
                                        <label class="form-check-label" for="{{ $permission->name }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            @error('roleHasPermissions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
