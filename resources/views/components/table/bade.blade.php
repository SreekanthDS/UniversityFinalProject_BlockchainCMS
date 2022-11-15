@props([
    'color' => 'primary',
    'outline' => true,
])

@php
    $outline = $outline ? 'badge-outline' : '';
@endphp

<div
    {{ $attributes->merge(['class' => 'badge badge-' . $color . ' badge-outline']) }}
    class="badge-{{ $color }} {{ $outline }}">
    {{ $slot }}
</div>
