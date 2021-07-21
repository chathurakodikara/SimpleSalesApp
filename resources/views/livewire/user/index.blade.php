<div class=" max-w-7xl mx-auto">
 
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Users/Distributors</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow  " 
                wire:click.prevent="$emitTo('user.form-model', 'create')">
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index ePath="user.index">
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>NIC</th>
                <th>Mobile No</th>
                <th>Territory</th>
                <th></th>

            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($users as $user)
            <x-table-tb-tr>
                <td>{{ str_pad($user->id,3,"0", STR_PAD_LEFT) }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nic }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->territory->name }}</td>
                <td>
                    <x-btn-icon-only class="hover:bg-amber-500 hover:bg-opacity-50" 
                        wire:click.prevent="$emitTo('user.form-model', 'edit', {{ $user }})"> 
                        <x-icon.edit class=" w-5 h-5" /> 
                    </x-btn-icon-only> 
                </td>

            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <div class="mt-4 ">
        {!! $users->onEachSide(0)->links() !!}
    </div>

    <livewire:user.form-model>
</div>
