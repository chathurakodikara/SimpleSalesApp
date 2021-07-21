<button type="button" {{ $attributes->merge(['class' => 'px-1 rounded-full transition-colors duration-300 ease-in-out w-6 h-6']) }}>
    {{ $slot }}
</button>