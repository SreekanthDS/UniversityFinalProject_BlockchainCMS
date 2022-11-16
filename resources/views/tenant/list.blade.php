<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
        </h2>
    </x-slot>

    <x-slot name="pageTitle">
        {{ __('Tenants') }}
    </x-slot>

    <div class="-mx-4 mx-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <livewire:datatables.tenants.tenant-list />
    </div>
</x-app-layout>
