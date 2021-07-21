<div class=" max-w-3xl mx-auto">
 
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Region</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow  " 
                wire:click.prevent="$emitTo('region.form-model', 'create')">
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index ePath="region.index">
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>Region Code</th>
                <th>Zone Name</th>
                <th>Region Name</th>
                <th></th>

            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($regions as $region)
            <x-table-tb-tr>
                <td>{{ $region->id }}</td>
                <td>{{ $region->zone->short_description }}</td>
                <td>{{ $region->name }}</td>

                <td>
                    <x-btn-icon-only class="hover:bg-amber-500 hover:bg-opacity-50" 
                        wire:click.prevent="$emitTo('region.form-model', 'edit', {{ $region }})"> 
                        <x-icon.edit class=" w-5 h-5" /> 
                    </x-btn-icon-only> 
                </td>

            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <div class="mt-4 ">
        {!! $regions->onEachSide(0)->links() !!}
    </div>

    <livewire:region.form-model>
</div>
