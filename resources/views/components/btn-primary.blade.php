<button type="submit" {{ $attributes->merge(['class' => 'bg-teal-700 px-5 uppercase py-1.5 rounded-sm focus:outline-none hover:bg-teal-600 transition-colors duration-150 ease-in-out text-white font-bold leading-relaxed']) }}> 
    {{ $slot }}
</button>