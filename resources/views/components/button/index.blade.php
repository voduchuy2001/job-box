@props([
    'type' => 'submit',
    'class' => null,
    ])

<button
    type="{{ $type }}"
    class="{{ $class }} @if($type == 'submit') btn-load @endif"
    {{ $attributes }}
>
    @if($type == 'submit')
        <span class="d-flex align-items-center">
            <i wire:loading
               wire:loading.attr="disabled"
               class="mdi mdi-loading mdi-spin align-middle me-2"></i>
            <span class="flex-grow-1">{{ $slot }}</span>
        </span>
    @else
        {{ $slot }}
    @endif
</button>
