@props([
    'id' => null,
    'type' => null,
    ])

<div wire:ignore.self id="{{ $id }}"
     class="modal">
    <div class="modal-dialog {{ $type ?: 'modal-dialog-centered' }}">
        <div class="modal-content">

            {{ $slot }}

        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('hiddenModal', (event) => {
                $('#{{ $id }}').modal('hide')
            });
        });
    </script>
@endpush
