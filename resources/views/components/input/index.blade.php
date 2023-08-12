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

<label class="block mt-4 text-sm">
    @if($label) <span class="text-gray-700 dark:text-gray-400">{{ $label }}</span>@endif
    <input
        @if($class) class="{{ $class }}
            @error($model) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500 @enderror"
        @endif
        @if($id) id="{{ $id }}" @endif
        @if($name) name="{{ $name }}" @endif
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($model) wire:model="{{ $model }}" @endif
        @if($value) value="{{ $value }}" @endif
        type="{{ $type }}"
        {{ $attributes }}
    />

        @error($model)
        <span class="text-xs text-red-600 dark:text-red-400">
            {{ $message }}
        </span>
        @enderror
</label>
