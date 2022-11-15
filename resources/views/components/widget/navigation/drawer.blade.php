<div class="drawer-side" style="scroll-behavior: smooth; scroll-padding-top: 5rem;">
    <label for="navigation-drawer" class="drawer-overlay"></label>
    <aside class="w-80 main-nav">
        <x-widget.navigation.includes.logo />
        <ul class="navbar-nav nav-pills p-4 overflow-y-auto w-80 bg-base-200 text-white">
            @foreach($items as $item)
                <!-- // TODO: Add gates in future. -->
                @continue(isset($item['gate']))
                <li class="nav-item">
                    <a
                        href="{{ $item['route'] }}"
                        class="{{ request()->routeIs($item['active']) ? 'active' : '' }} nav-link"
                        aria-selected="{{ request()->routeIs([$item['active']]) }}">
                        <i class="{{ $fontAwesomeIconTypeAndSize . ' fa-' . $item['icon'] }}"></i>
                        <span>{{ $item['title'] }}</span>
                    </a>
                </li>
            @endforeach
            <li>
                <a
                    href="{{ Route::tenant('calendar.view') }}"
                    class="{{ request()->routeIs('calendar*') ? 'active' : '' }}"
                    aria-selected="{{ request()->routeIs(['calendar*']) }}">
                    <i class="{{ $fontAwesomeIconTypeAndSize . ' fa-calendar' }}"></i>
                    Calendar
                </a>
            </li>
        </ul>
    </aside>
</div>
