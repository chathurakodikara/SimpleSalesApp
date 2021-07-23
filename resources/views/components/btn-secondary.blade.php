<button type="submit" {{ $attributes->merge(['class' => 'w-full px-4 py-1 rounded-sm focus:outline-none hover:bg-cool-gray-700 transition-colors duration-150 ease-in-out text-gray-600 hover:text-gray-200 font-bold leading-relaxed']) }}> 
    {{ $slot }}
</button>