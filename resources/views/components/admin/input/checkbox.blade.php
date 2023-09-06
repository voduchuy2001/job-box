@props([
    'name' => null,
    'id' => null,
    'model' => null,
])

<div class="form-check mb-3">
    <input
        class="form-check-input"
        type="checkbox" id="{{ $id }}"
        name="{{ $name }}"
        @if($model) wire:model="{{ $model }}" @endif
    >
    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>
