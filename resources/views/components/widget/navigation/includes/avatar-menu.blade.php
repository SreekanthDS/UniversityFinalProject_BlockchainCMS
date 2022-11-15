{{--  <div class="dropdown dropdown-end">
    <button tabindex="0" class="avatar placeholder">
        <div class="bg-primary text-white rounded-full w-10">
            <span class="bold">{{ Auth::user()->initials() }}</span>
        </div>
    </button>
    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
        <li>
            <a class="justify-between">
                Profile
                <span class="badge">New</span>
            </a>
        </li>
        <li><a href="{{ route('tenant.settings.user.personal') }}">Settings</a></li>
        <li><a href="{{ route('tenant.logout') }}">Logout</a></li>
    </ul>
</div> --}}
<div
    class="my-profile flex flex-col flex-wrap items-end -mx-3 mt-0 font-light tracking-wider leading-4 text-primary font-medium md:flex-row-reverse">
    <div class="flex-grow-0 flex-shrink-0 px-2 mt-0 w-full max-w-full tracking-wider text-primary font-medium"
        style="flex-basis: 0%;">
        <x-widget.navigation.includes.notification-badge counter="3" />
        <div class="hidden w-16 h-16 leading-4 bg-white md:block"
            style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);">
            <img src="https://avatars.dicebear.com/api/adventurer/asdasd.svg" class="block m-px w-16 max-w-full h-16 text-primary font-medium align-middle"
                style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);" />
        </div>
    </div>
    <div class="flex flex-row-reverse flex-grow flex-shrink-0 px-2 mt-0 w-full max-w-full tracking-wider text-primary font-medium"
        style="flex-basis: 0%;">
        <div class="flex flex-col items-end leading-4">
{{--            <span class="text-primary font-medium">{{ Auth::user()?->initials() }}</span>--}}
            <div class="flex mb-1" style="font-size: 11.2941px;">
                <span class="hidden text-xs md:inline-block text-white">HR support manager</span><span
                    class="hidden mx-1 text-xs md:inline-block text-white">|</span>
                <div class="dropdown dropdown-end">
                    <button tabindex="0"
                        class="block p-0 ml-0 whitespace-nowrap cursor-pointer hover:font-semibold focus:font-semibold dropdown dropdown-end option-btn text-white">
                        Options
                    </button>
                    <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a href="{{ route('tenant.settings.user.personal') }}">Settings</a></li>
                        <li class="menu-title">
                            <span>Theme</span>
                        </li>
                        <li :class="{'bordered': theme === 'light'}" @click="$dispatch('change-theme', 'light')"><a>Light</a></li>
                        <li :class="{'bordered': theme === 'dark'}" @click="$dispatch('change-theme', 'dark')"><a>Dark</a></li>
                        <li :class="{'bordered': theme === 'igentics'}" @click="$dispatch('change-theme', 'igentics')"><a>Igentics</a></li>
                        <li class="menu-title">
                            <span></span>
                        </li>
                        <li><a href="{{ route('tenant.logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
