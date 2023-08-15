@props(['type' => null])

@php
    $alert = session('alert');
@endphp

@if ($alert)
    <div class="alert alert-{{ $alert['type'] ?? $type ?? 'success' }}">
        {{ $alert['message'] }}
    </div>
@endif
