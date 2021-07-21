<div class="relative text-gray-400 focus-within:text-indigo-500">
    <div class="absolute inset-y-0 left-0 pl-3 pt-0.5 flex items-center pointer-events-none">
        <svg xmlns="http://www.w3.org/2000/svg" wire:loading.class="hidden" class=" w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
        <svg wire:loading class="animate-spin mr-3 h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
    </div>
    <input type="text"  wire:model='search'
        class="py-1.5 px-4 bg-cool-gray-100 focus:bg-white placeholder-gray-400 text-gray-900 rounded-full focus:shadow-md appearance-none w-full block pl-12 focus:outline-none border border-cool-gray-200 focus:ring-0 focus:border-blue-gray-200 "
        placeholder="Search..." >
</div>