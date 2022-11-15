@if (app()->isLocal())
    @if(config('app.browsersync'))
        <script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
    @endif
    <x-widget.breakpoint-indicator />
@endif
