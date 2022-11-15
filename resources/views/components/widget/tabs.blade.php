<div class="mt-4" x-data="{ selected: 'users' }" x-init="$watch('selected', value => $dispatch('tab-change', value))">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
        <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" x-model="selected">
            <option value="users">Users</option>
            <option value="addresses">Addresses</option>
            <option value="apps">Apps</option>
        </select>
    </div>
    <div class="hidden sm:block"  x-data="{ tab: 'users' }">
        <div class="w-96">
            <div class="">
                <div class="tabs secondary-nav">
                    <a class="tab" :class="{'tab-active': selected === 'users'}" x-on:click.prevent="selected = 'users'">Users</a>
                    <a class="tab" :class="{'tab-active': selected === 'addresses'}" @click="selected = 'addresses'">Addresses</a>
                    <a class="tab" :class="{'tab-active': selected === 'licenses'}" @click="selected = 'licenses'">Licenses</a>
                    <a class="tab" :class="{'tab-active': selected === 'apps'}" @click="selected = 'apps'">Apps</a>
                </div>
            </div>
        </div>
    </div>
</div>
