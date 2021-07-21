<div class=" max-w-7xl mx-auto">
 
    <div class=" flex items-end justify-between gap-2  pb-2">
        <div class="flex items-center gap-x-2">
            <h3 class=" text-2xl font-medium mr-3 ">Products</h3>
            <button 
                class="btn-icon text-teal-600 hover:text-teal-700 bg-gray-200 hover:shadow  " 
                wire:click.prevent="$emitTo('product.form-model', 'createProduct')">
                <x-icon.add />
                <span>Add</span>
            </button>
        </div>


        <div class=" ml-auto">
            <livewire:search-index ePath="product.index">
        </div>

    </div>

    <x-table-wrapper>
        <x-slot name="thead">
            <x-table-th-tr>
                <th>SKUCode</th>
                <th class=" capitalize">SKU Name</th>
                <th class=" text-right">MRP</th>
                <th class=" text-right">Distributor Price</th>
                <th class=" text-right">Weight/Volume</th>
                <th class="text-center">Unit</th>


                <th></th>

            </x-table-th-tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($products as $product)
            <x-table-tb-tr>
                <td>{{ $product->code }}</td>
                <td class=" capitalize">{{ $product->name }}</td>
                <td class=" text-right">{{ number_format($product->mrp, 2) }}</td>
                <td class=" text-right">{{ number_format($product->distributor_price, 2) }}</td>

                <td class="text-right">{{ $product->weight_volume *1 }}</td>
                <td  class=" text-sm text-center">{{ $product->unit }}</td>
                <td>
                    <x-btn-icon-only class="hover:bg-amber-500 hover:bg-opacity-50" 
                        wire:click.prevent="$emitTo('product.form-model', 'editProduct', {{ $product }})"> 
                        <x-icon.edit class=" w-5 h-5" /> 
                    </x-btn-icon-only> 
                </td>

            </x-table-tb-tr>
                
            @endforeach
        </x-slot>

    </x-table-wrapper>

    <div class="mt-4 ">
        {!! $products->onEachSide(0)->links() !!}
    </div>

    <livewire:product.form-model>
</div>
