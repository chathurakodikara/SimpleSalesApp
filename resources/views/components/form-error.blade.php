<div {{ $attributes->merge(['class' => 'text-sm text-rose-600 mt-0.5']) }}> 
    @error($for)
        {{ $message ?? ''}}
    @enderror
</div>