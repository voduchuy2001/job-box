<div>
    @include('admin.partials.page-title')

    <x-admin.card :header="__('Edit Blog')">
        <x-form wire:submit.prevent="update">
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

                <div class="d-flex mb-3 align-items-center justify-content-center">
                    <figure class="figure">
                        <img src="{{ asset($oldImage) }}" class="rounded-circle avatar-xl mb-3" alt="{{ $title }}">
                        <figcaption class="figure-caption text-center">{{ __('Old Image') }}</figcaption>
                    </figure>
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
                            class="btn btn-primary">{{ __('Updates') }}</x-button>
                    </div>
                </div>
            </div>
        </x-form>
    </x-admin.card>
</div>
