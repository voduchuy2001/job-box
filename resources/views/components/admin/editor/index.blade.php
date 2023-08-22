@props([
    'name' => null,
    'id' => null,
    'model' => null,
    ])

<textarea
    @if($name) name="{{ $name }}" @endif
    @if($id) id="{{ $id }}" @endif
    @if($model) wire:model="{{ $model }}" @endif></textarea>

<script>
    tinymce.init({
        @if($id)
        selector: `#{{ $id }}`,
        @endif
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });

            editor.on('blur', function (e) {
                @if($model)
                    @this.set(`{{ $model }}`, editor.getContent());
                @endif
            });
        },

        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount fullscreen',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | fullscreen',
        image_class_list: [
            { title: 'Responsive', value: 'img-fluid' }
        ],
        file_picker_callback: elFinderBrowser
    });

    function elFinderBrowser (callback, value, meta) {
        tinymce.activeEditor.windowManager.openUrl({
            title: 'File Manager',
            url: `{{ route('elfinder.tinymce5') }}`,
            onMessage: function (dialogApi, details) {
                if (details.mceAction === 'fileSelected') {
                    const file = details.data.file;

                    const info = file.name;

                    if (meta.filetype === 'file') {
                        callback(file.url, {text: info, title: info});
                    }

                    if (meta.filetype === 'image') {
                        callback(file.url, {alt: info});
                    }

                    if (meta.filetype === 'media') {
                        callback(file.url);
                    }

                    dialogApi.close();
                }
            }
        });
    }
</script>

@pushonce('styles')
    <script src="https://cdn.tiny.cloud/1/p2dn1c52nfnobcdqv1qtbglx3ivx2ry4kn67m5w6ksk35mek/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpushonce
