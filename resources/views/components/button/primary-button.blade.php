<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-gray-800 hover:bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500']) }}>
    {{ $slot }}
</button>
