{{-- @php
    $borderColors = '';

    if ($errors->has($for)) {
        $me
        $borderColors = "border-rose-300 focus:border-rose-400 focus:ring-1 focus:ring-rose-400";
    }
@endphp --}}


<input type="text" 
    {{ $attributes->merge(['class' => 'new-form-input ']) }}>

