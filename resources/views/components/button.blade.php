<button
    {{ $attributes->merge([
        'class' => 'px-4 py-2 bg-violet-500 text-white font-semibold rounded-lg shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-200 focus:ring-opacity-50
                            disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-violet-500 disabled:text-white disabled:shadow-none
                            ',
    ]) }}>
    {{ $slot }}
</button>
