<div class=" max-w-3xl mx-auto">
 
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Territories</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow  " 
                wire:click.prevent="$emitTo('territory.form-model', 'create')">
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index ePath="territory.index">
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>Region Code</th>
                <th>Zone Name</th>
                <th>Region Name</th>
                <th>Territory Name</th>
                <th></th>

            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($territories as $territory)
            <x-table-tb-tr>
                <td>{{ str_pad($territory->id,3,"0", STR_PAD_LEFT) }}</td>
                <td>{{ $territory->region->zone->short_description }}</td>
                <td>{{ $territory->region->name }}</td>

                <td>{{ $territory->name }}</td>

                <td>
                    <x-btn-icon-only class="hover:bg-amber-500 hover:bg-opacity-50" 
                        wire:click.prevent="$emitTo('territory.form-model', 'edit', {{ $territory }})"> 
                        <x-icon.edit class=" w-5 h-5" /> 
                    </x-btn-icon-only> 
                </td>

            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <div class="mt-4 ">
        {!! $territories->onEachSide(0)->links() !!}
    </div>

    <livewire:territory.form-model>
</div>
