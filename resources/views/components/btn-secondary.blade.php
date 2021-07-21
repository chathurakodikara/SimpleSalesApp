<button type="submit" {{ $attributes->merge(['class' => 'bg-cool-gray-800 px-4 py-2 rounded-sm focus:outline-none hover:bg-cool-gray-700 transition-colors duration-150 ease-in-out text-white font-bold leading-relaxed']) }}> 
    {{ $slot }}
</button>