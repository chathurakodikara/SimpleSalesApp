@props(['value'])
<label {{ $attributes->merge(['class' => ' grid grid-cols-4 items-center gap-x-4 text-cool-gray-600 text-sm font-semibold text-right mb-2']) }}>
    {{ $value ?? $slot }}
</label>