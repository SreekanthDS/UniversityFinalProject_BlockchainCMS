<div class="navbar bg-base-100">
    <div class="flex-none lg:hidden">
        <label for="navigation-drawer" class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </label>
    </div>
    <div class="flex-1">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="{{ asset('/images/cms-logo.png') }}" alt="Workflow">
        </div>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    <span class="badge badge-sm indicator-item">8</span>
                </div>
            </label>
            <div tabindex="0" class="mt-3 card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                    <span class="font-bold text-lg">8 Items</span>
                    <span class="text-info">Subtotal: $999</span>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block">View cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img src="https://placeimg.com/80/80/people" />
                </div>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a class="justify-between">
                        Profile
                        <span class="badge">New</span>
                    </a>
                </li>
                <li><a>Settings</a></li>
                <li class="menu-title">
                    <span>Theme</span>
                </li>
                <li :class="{'bordered': theme === 'light'}" @click="$dispatch('change-theme', 'light')"><a>Light</a></li>
                <li :class="{'bordered': theme === 'dark'}" @click="$dispatch('change-theme', 'dark')"><a>Dark</a></li>
                <li :class="{'bordered': theme === 'igentics'}" @click="$dispatch('change-theme', 'igentics')"><a>Igentics</a></li>
                <li class="menu-title">
                    <span></span>
                </li>
                <li><a>Logout</a></li>
            </ul>
        </div>
    </div>
</div>
