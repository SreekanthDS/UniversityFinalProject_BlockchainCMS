@props([
    'title' => 'example',
    'value' => 2100,
    'description' => '',
    'icon' => 'fad fa-user',
    'colour' => null,
])


<div {{ $attributes->merge(['class' => 'stat']) }}>
    @if($icon)
        <div {{ $attributes->merge(['class' => 'stat-figure text-' . $colour]) }} class="text-{{ $colour }}">
            <i class="fa-2xl {{ $icon }}"></i>
        </div>
    @endif
    <div class="stat-title">{{ $title }}</div>
    <div {{ $attributes->merge(['class' => 'stat-value text-' . $colour]) }}  class="text-{{ $colour }}">{{ $value }}</div>
    <div class="stat-desc">{{ $description }}</div>
</div>


