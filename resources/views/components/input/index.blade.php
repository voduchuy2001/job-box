@props([
    'label' => null,
    'type' => 'text',
    'class' => null,
    'placeholder' => null,
    'model' => null,
    'name' => null,
    'id' => null,
    'value' => null,
    ])

<div>
    @if($label) <label for="firstName" class="form-label">{{ $label }}</label> @endif
    <input
        type="{{ $type }}"
        @if($class) class="{{ $class }} @error($model) is-invalid @enderror" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($model) wire:model="{{ $model }}" @endif
        @if($value) value="{{ $value }}" @endif
        @if($name) name="{{ $name }}" @endif
        {{ $attributes }}>

    {{ $slot }}

    @error($model)
    <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
