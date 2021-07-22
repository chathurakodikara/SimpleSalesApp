<div>
    <div class=" grid grid-cols-4 gap-x-6 mb-5">
        <x-form-label>
            <div>Zone</div>
            <x-form-select class=" col-span-3 border-gray-300 focus:border-gray-400" wire:model="zone_id">
                <option value=""></option>
                @foreach ($zones as $item)
                    <option value="{{ $item->id }}">{{ $item->short_description }}</option>
                @endforeach
            </x-form-select>
            <x-form-error for='zone_id' />
        </x-form-label>

        <x-form-label>
            <div>Region</div>
            <x-form-select class=" col-span-3 border-gray-300 focus:border-gray-400" wire:model="region_id">
                <option value=""></option>
                @foreach ($regions as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </x-form-select>
            <x-form-error for='region_id' />
        </x-form-label>

        <x-form-label>
            <div>Territory</div>
            <x-form-select class=" col-span-3 border-gray-300 focus:border-gray-400" wire:model="territory_id">
                <option value=""></option>
                @foreach ($territories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </x-form-select>
            <x-form-error for='territory_id' />
        </x-form-label>

        <x-form-label>
            <div>Distributer</div>
            <x-form-select class=" col-span-3 border-gray-300 focus:border-gray-400" wire:model="distributer_id">
                <option value=""></option>
                @foreach ($distributers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </x-form-select>
            <x-form-error for='distributer_id' />
        </x-form-label>


        <x-form-label>
            <div>Date</div>
            <x-form-input wire:model="date" placeholder="Automatically" disabled
                class=" col-span-3 border-gray-300 focus:border-gray-400 bg-gray-50 placeholder-blue-gray-400" />
            <x-form-error for='date' />
        </x-form-label>

        <x-form-label>
            <div>Po No</div>
            <x-form-input wire:model="po_no" placeholder="Automatically" disabled
                class="col-span-3 border-gray-300 focus:border-gray-400 bg-gray-50 placeholder-blue-gray-400" />
            <x-form-error for='po_no' />
        </x-form-label>

        <x-form-label class=" col-span-2">
            <div>Remarks</div>
            <x-form-input class=" col-span-3 border-gray-300 focus:border-gray-400 " wire:model="remarks" />
            <x-form-error for='remarks' />
        </x-form-label>
    </div>

    <x-msg-error error='error' />


    
</div>

