
<div {{ $attributes->merge(['class' => 'text-sm text-rose-600 mt-0.5 col-span-2 text-left col-start-2 col-span-3']) }}> 
    @error($for)
        {{ $message ?? ''}}
    @enderror
</div>