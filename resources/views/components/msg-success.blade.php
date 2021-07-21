@if(session()->has($sKey))
    <div class="flex gap-2 border border-lime-200 bg-lime-100 px-4 py-1 text-lime-700 rounded-full text-sm font-bold items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class=" w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /> </svg>
        {{ session()->get($sKey) }}
    </div>
@endif