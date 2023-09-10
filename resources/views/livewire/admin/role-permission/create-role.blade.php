<div>
    <x-form wire:submit.prevent="saveRole">
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

            @foreach($permissions as $key => $permission)
                <div class="col-lg-4">
                    <x-admin.input.checkbox
                        model="permission"
                        name="permission"
                        :value="$permission->id"
                        :id="$permission->id"
                    >{{ $permission->name }}</x-admin.input.checkbox>
                </div>
            @endforeach

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Create New') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
