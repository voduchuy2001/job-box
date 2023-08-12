@props([
    'type' => 'submit',
    'class' => null,
])

<button
    type="{{ $type }}"
    class="{{ $class }}"
    {{ $attributes }}
>
    {{ $slot }}</button>
