@props([
    'name' => null,
    'id' => null,
    'model' => null,
    ])

<div wire:ignore x-data x-init="
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.create($refs.input);
            FilePond.setOptions({
                acceptedFileTypes: ['image/*'],
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        @this.upload('{{ $model }}', file, load, error, progress)

                    },
                    revert: (filename, load) => {
                        @this.removeUpload('{{ $model }}', filename, load)
                    },
                },
            });
        ">
    <input
        type="file"
        data-max-file-size="2MB"
        x-ref="input"
        value="https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg"
        wire:model="{{ $model }}">
</div>

@pushonce('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpushonce
