<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <x-slot name="pageTitle">
        {{ __('User') }}: {{ $user->name }}
    </x-slot>

    <div class="card w-full card-compact bg-base-100 shadow-xl overflow-hidden sm:rounded-lg mx-4 sm:mx-auto">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium font-semibold">User Details</h3>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __('Name') }}</dt>
                    <dd class="mt-1 text-sm font-semibold sm:mt-0 sm:col-span-2">{{ $user->name }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __('Email') }}</dt>
                    <dd class="mt-1 text-sm font-semibold sm:mt-0 sm:col-span-2">{{ $user->email }}</dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">{{ __('Created') }}</dt>
                    <dd class="mt-1 text-sm font-semibold sm:mt-0 sm:col-span-2">{{ $user->created_at }}</dd>
                </div>
            </dl>
        </div>
    </div>
</x-app-layout>
