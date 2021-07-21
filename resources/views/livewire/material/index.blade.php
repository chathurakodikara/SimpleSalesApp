<div class=" max-w-5xl mx-auto">
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Material</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow " 
                wire:click.prevent="$emitTo('material.form', 'createMaterial')">
    
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index>
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>Code</th>
                <th>Description</th>
                <th>Unit Cost</th>
            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($materials as $material)
            <x-table-tb-tr>
                <td>{{ $material->code }}</td>
                <td>{{ $material->description }}</td>
                <td>{{ $material->unit_cost }}</td>
            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <livewire:material.form>
</div>
