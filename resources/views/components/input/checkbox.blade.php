@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'model' => null,
])

<div class="flex items-center mb-4">
    <input
        @if($id) id="{{ $id }}" @endif
        @if($name) name="{{ $name }}" @endif
        type="checkbox"
        @if($model) wire:model="{{ $model }}" @endif
        {{ $attributes }}
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    @if($label) <label
        for="{{ $id }}"
        class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-200">{{ $label }}</label> @endif
</div>
