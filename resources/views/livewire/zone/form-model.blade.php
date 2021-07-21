<div>
    <x-jet-dialog-modal wire:model="modelZoneForm" maxWidth="2xl">
        <x-slot name="title"> 
            {{ $formTitle }} 
        </x-slot>
        <x-slot name="content">

            <div>

                <x-form-label >
                    <div>Zone Code <span class=" req">*</span></div>
                    <x-form-input  class=" bg-gray-100 border-opacity-20" wire:model="zone_code" for='' disabled/>
                </x-form-label>

                <x-form-label>
                    <div>Long description <span class=" req">*</span></div>
                    <x-form-input wire:model="long_description" for='long_description'/>
                    <x-form-error for='long_description' />
                </x-form-label>

                <x-form-label>
                    <div>Short description <span class="req">*</span></div>
                    <x-form-input class="col-span-3" wire:model="short_description" for='short_description'/>
                    <x-form-error for='short_description' />
                </x-form-label>

            </div>      
        </x-slot>
        <x-slot name="footer">
            <div class=" flex justify-between items-center w-full gap-x-2">
                <x-msg-success sKey="successZone" />
                <x-btn-primary class=" ml-auto" wire:click.prevent="store()">Save</x-btn.prymary>
            </div>

        </x-slot>
    </x-jet-dialog-modal>
</div>