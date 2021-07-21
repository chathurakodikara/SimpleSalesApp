<div class=" max-w-3xl mx-auto">
 
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Zones</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow  " 
                wire:click.prevent="$emitTo('zone.form-model', 'create')">
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index ePath="zone.index">
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>Zone Code</th>
                <th>Zone Long Description</th>
                <th>Short Description</th>
                <th></th>

            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($zones as $zone)
            <x-table-tb-tr>
                <td>{{ str_pad($zone->id,3,"0", STR_PAD_LEFT) }}</td>
                <td class=" capitalize">{{ $zone->long_description }}</td>
                <td class=" capitalize">{{ $zone->short_description }}</td>

                <td>
                    <x-btn-icon-only class="hover:bg-amber-500 hover:bg-opacity-50" 
                        wire:click.prevent="$emitTo('zone.form-model', 'edit', {{ $zone }})"> 
                        <x-icon.edit class=" w-5 h-5" /> 
                    </x-btn-icon-only> 
                </td>

            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <div class="mt-4 ">
        {!! $zones->onEachSide(0)->links() !!}
    </div>

    <livewire:zone.form-model>
</div>
