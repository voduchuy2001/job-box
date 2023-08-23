<div>
    @include('admin.partials.page-title')

    <x-admin.card :header="__('Create Blog')">
        <x-form wire:submit.prevent="create">
            <div class="row g-2">
                <div class="col-lg-12">
                    <x-admin.filepond
                        name="image"
                        id="image"
                        model="image"
                    ></x-admin.filepond>

                    @error('image')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="col-lg-12">
                    <x-admin.input
                        :label="__('Title')"
                        class="form-control"
                        type="text"
                        name="title"
                        model="title"
                        id="title"
                        placeholder="{{ __('Enter title') }}"
                        required
                    >
                    </x-admin.input>
                </div>

                <div class="col-lg-12" wire:ignore>
                    <x-admin.editor
                        id="content"
                        name="content"
                        model="content"></x-admin.editor>
                </div>

                @error('content')
                <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

                <div class="col-lg-12 mt-3">
                    <div class="text-end">
                        <x-button
                            type="submit"
                            class="btn btn-primary">{{ __('Create New') }}</x-button>
                    </div>
                </div>
            </div>
        </x-form>
    </x-admin.card>
</div>
