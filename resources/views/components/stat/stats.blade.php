@props([
    'stats' => [],
    'joined' => true,
])

<div class="stats sm:stats-horizontal stats-vertical shadow mt-2 px-2 sm:mt-0 sm:my-2 w-full">
    @foreach($stats as $stat)
        <x-stat.stat
                title="{{ $stat['title'] }}"
                value="{{ $stat['value'] }}"
                description="{{ $stat['description'] ?? null }}"
                colour="{{ $stat['colour'] ?? 'primary' }}"
                icon="{{ $stat['icon'] ?? null }}"/>
        @if(!$joined)
            </div>
            <div class="stats shadow">
        @endif
    @endforeach
</div>
