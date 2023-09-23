<div>
    <x-form wire:submit.prevent="updateProfile">
        <div class="row">
            <div class="col-lg-4">
                <x-admin.input
                    :label="__('Full Name')"
                    class="form-control"
                    type="name"
                    id="name"
                    name="name"
                    model="name"
                    readonly
                    disabled
                ></x-admin.input>
            </div>

            <div class="col-lg-4">
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

            <div class="col-lg-4">
                <label class="form-label">{{ __('Status') }}</label>
                <select class="form-select mb-3" wire:model="userStatus">
                    <option value="Is Active">{{ __('Is Active') }}</option>
                    <option value="Blocked">{{ __('Blocked') }}</option>
                </select>

                @error('userStatus')
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Update') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
