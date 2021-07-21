@props(['value'])
<label {{ $attributes->merge(['class' => 'text-cool-gray-600 text-sm font-semibold']) }}>
    {{ $value ?? $slot }}
</label>