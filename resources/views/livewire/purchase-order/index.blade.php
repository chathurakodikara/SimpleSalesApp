<div class=" max-w-7xl mx-auto pb-8" >

    <div class=" grid lg:grid-cols-5 grid-cols-3 gap-x-6 mb-5">
 
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
            <div>Po No</div>
            <x-form-input wire:model="po_no" 
                class="col-span-3 border-gray-300 focus:border-gray-400 bg-gray-50 placeholder-blue-gray-400" />
            <x-form-error for='po_no' />
        </x-form-label>

        <x-form-label>
            <div>From</div>
            <x-form-date wire:model="date_from" class=" col-span-3 " />
            <x-form-error for='date_from' />
        </x-form-label>

        <x-form-label>
            <div>To</div>
            <x-form-date wire:model="date_to" class=" col-span-3 " />
            <x-form-error for='date_to' />
        </x-form-label>

        <button class=" bg-green-600 focus:outline-none hover:bg-green-500 transition-colors py-3 rounded text-white col-start-5"   
            wire:click="export">Excel Export</button>

    </div>


    <div class=" grid grid-cols-8 gap-1 mt-10">
        <x-po-index-head-wrapper>region </x-po-index-head-wrapper>
        <x-po-index-head-wrapper>territory </x-po-index-head-wrapper>

        <x-po-index-head-wrapper>distributor </x-po-index-head-wrapper>
        <x-po-index-head-wrapper>po number </x-po-index-head-wrapper>
        <x-po-index-head-wrapper>Date </x-po-index-head-wrapper>
        <x-po-index-head-wrapper>Time </x-po-index-head-wrapper>
        <x-po-index-head-wrapper>total price</x-po-index-head-wrapper>
        <x-po-index-head-wrapper>View Po</x-po-index-head-wrapper>
    </div>

    <div>
        @foreach ($purchaseOrders as $purchaseOrder)
            <div class="grid grid-cols-8 gap-1 mt-1.5">
               <x-po-index-td-wrapper> {{ $purchaseOrder->territory->region->name }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper> {{ $purchaseOrder->territory->name }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper class=" text-left text-sm "> {{ $purchaseOrder->user->name }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper > {{ $purchaseOrder->no }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper > {{ $purchaseOrder->order_date }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper > {{ $purchaseOrder->order_time }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper class=" text-right"> {{ number_format($purchaseOrder->subtotal, 2) }} </x-po-index-td-wrapper>
               <x-po-index-td-wrapper class=" p-0" > 
                   <x-btn-secondary> View </x-btn-secondary> </x-po-index-td-wrapper>

            </div>
        @endforeach
    </div>

</div>