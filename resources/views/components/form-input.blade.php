@php
    $borderColors = '';

    if ($errors->has($for)) {
        $borderColors = "border-rose-300 focus:border-rose-400 focus:ring-1 focus:ring-rose-400";
    }
@endphp


<input type="text" 
    {{ $attributes->merge(['class' => 'rounded-sm block w-full focus:ring-0 border-blue-gray-300 focus:border-blue-gray-400 '.$borderColors]) }}>

