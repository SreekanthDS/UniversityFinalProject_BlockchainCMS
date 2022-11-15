<div class="search site-search flex items-center justify-between" x-data="Components.search()" x-trap.noreturn="focus">
    <input type="text" class="flex-grow p-0 m-0 bg-transparent cursor-text flex-1" 
        v-model="searchValue"
        id="search-field"
        placeholder="Search your data here ..."/>
    <i class="fa fa-magnifying-glass"></i>
</div>
<div class="pointer-events-none ml-4 top-2 gap-1 opacity-50 hidden sm:flex">
    <kbd class="kbd kbd-sm">⌃</kbd>
    <kbd class="kbd kbd-sm">K</kbd>
</div>