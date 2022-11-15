@props([
    'icon' => 'fa-user',
    'name' => 'example',
    'value' => 2100,
])

<div class="plaque-container">
    <div class="plaque ratio ratio-hex ms-1">
        <div class="text-primary flex flex-col">
            <svg viewBox="0 0 100 25" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="25" x2="50" y2="0" vector-effect="non-scaling-stroke"></line>
                <line x1="50" y1="0" x2="100" y2="25" vector-effect="non-scaling-stroke"></line>
                <polygon class="fill-shape" points="0 25 50 0 100 25" vectorEffect="non-scaling-stroke"></polygon>
            </svg>
            <div class="content flex flex-col items-center flex-grow-1 justify-center text-center p-3">
                <i class="fa {{$icon}}"></i>
                <h3 class="mb-0">{{$value}}</h3>
                <small>{{$name }}</small>
            </div>
            <svg viewBox="0 0 100 25" xmlns="http://www.w3.org/2000/svg">
                <line x1="0" y1="0" x2="50" y2="25" vector-effect="non-scaling-stroke"></line>
                <line x1="50" y1="25" x2="100" y2="0" vector-effect="non-scaling-stroke"></line>
                <polygon class="fill-shape" points="0 0 50 25 100 0" vectorEffect="non-scaling-stroke"></polygon>
            </svg>
        </div>
    </div>
</div>
