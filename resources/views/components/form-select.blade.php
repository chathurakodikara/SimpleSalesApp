@php
    $borderColors = '';

    if ($errors->has($for)) {
        $borderColors = "border-rose-300 focus:border-rose-400 focus:ring-1 focus:ring-rose-400";
    }

@endphp

<select  {!! $attributes->merge(['class' => 'new-form-input '.$borderColors]) !!}>
    {{ $slot }}
</select>