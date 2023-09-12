@props([
    'label' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    ])

<div class="mb-3">
    @if($label) <label for="{{ $id }}" class="form-label">{{ $label }}</label> @endif
    <input
        class="form-control datepicker"
        @if($id) id="{{ $id }}" @endif
        @if($model) wire:model="{{ $model }}" @endif
        @if($name) name="{{ $name }}" @endif
        placeholder="dd-mm-YYYY"
        {{ $attributes }}
    >

    {{ $slot }}

    @error($model)
    <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

@pushonce('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script type="text/javascript">
        flatpickr(".datepicker", {
            dateFormat: "d-m-Y",
        });

        document.addEventListener('livewire:initialized', () => {
            @this.on('refresh', (event) => {
                flatpickr(document.querySelector('.datepicker')).clear();
            });
        });
    </script>
@endpushonce
