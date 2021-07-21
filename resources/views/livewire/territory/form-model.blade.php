<div>
    <x-jet-dialog-modal wire:model="modelTerritoryForm" maxWidth="2xl">
        <x-slot name="title"> 
            {{ $formTitle }} 
        </x-slot>
        <x-slot name="content">
            <div>
                <x-form-label>
                    <div>Zone <span class=" req">*</span></div>
                    <x-form-select class="col-span-3 capitalize" wire:model="zone_id" for='zone_id'>
                        <option value="">Select</option>
                        @foreach ($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->short_description }}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-error for='zone_id' />
                </x-form-label>

                <x-form-label>
                    <div>Region <span class=" req">*</span></div>
                    <x-form-select class="col-span-3 capitalize" wire:model="region_id" for='region_id'>
                        <option value="">Select</option>
                        @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-error for='region_id' />
                </x-form-label>

                <x-form-label>
                    <div>Territory Code <span class=" req">*</span></div>
                    <x-form-input wire:model="territory_code" for='' disabled
                        class=" bg-gray-100 border-opacity-20 placeholder-blue-gray-400"  placeholder="Automatically"/>
                </x-form-label>

                <x-form-label>
                    <div>Territory Name <span class="req">*</span></div>
                    <x-form-input class="col-span-3" wire:model="territory_name" for='territory_name'/>
                    <x-form-error for='territory_name' />
                </x-form-label>

            </div>      
        </x-slot>
        <x-slot name="footer">
            <div class=" flex justify-between items-center w-full gap-x-2">
                <x-msg-success sKey="successTerritory" />
                <x-btn-primary class=" ml-auto" wire:click.prevent="store()">Save</x-btn.prymary>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>