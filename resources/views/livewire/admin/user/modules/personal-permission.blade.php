<div>
    <span class="mb-2"><strong>{{ __('Permissions') }}</strong></span>
    <x-form wire:submit.prevent="savePermission">
        <div class="row">
            @foreach($permissions as $key => $permission)
                <div class="col-lg-4">
                    <div class="form-check">
                        <input class="form-check-input"
                               name="userHasPermissions"
                               wire:model="userHasPermissions"
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

                <div class="col-lg-12">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <x-button
                            type="submit"
                            class="btn btn-primary">{{ __('Update') }}</x-button>
                    </div>
                </div>
        </div>
    </x-form>
</div>
