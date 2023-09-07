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
            <span
                wire:loading
                wire:loading.attr="disabled"
                class="spinner-border flex-shrink-0"></span>
            <span class="flex-grow-1 ms-2">{{ $slot }}</span>
        </span>
    @else
        {{ $slot }}
    @endif
</button>
