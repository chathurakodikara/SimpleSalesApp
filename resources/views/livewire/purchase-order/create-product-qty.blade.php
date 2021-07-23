<div class=" pb-8">
    <div class=" grid grid-cols-8 gap-1 mt-10">
        <div class=" text-center po-input-wrapper uppercase bg-gray-300">SUK Code</div>
        <div class=" text-center po-input-wrapper col-span-2 bg-gray-300">SUK Name</div>

        <div class=" text-center po-input-wrapper uppercase bg-gray-300">Unit Price</div>
        <div class=" text-center po-input-wrapper uppercase bg-gray-300">AVB QTY</div>
        <div class=" text-center po-input-wrapper uppercase bg-gray-300">ENTER QTY</div>
        <div class=" text-center po-input-wrapper uppercase bg-gray-300">Units</div>

        <div class=" text-center po-input-wrapper uppercase bg-gray-300">Total Price</div>
    </div>

    <div>
        @foreach ($products as $product)
            <div class="grid grid-cols-8 gap-1 mt-1.5">
                <div>
                    <input type="hidden" wire:model="product_id.{{ $product->id }}" >

                    <x-form-input class="border-gray-300 bg-blue-gray-100" disabled wire:model="code.{{ $product->id }}" /> 
                </div>
                <x-form-input class="col-span-2 border-gray-300 bg-blue-gray-100 " disabled wire:model="name.{{ $product->id }}"  /> 

                <x-form-input  wire:model="distributor_price.{{ $product->id }}" class="border-gray-300 text-right bg-blue-gray-100" disabled /> 
                <x-form-input class="border-gray-300 bg-blue-gray-100" disabled/> 

                <x-form-input wire:model="quantity.{{ $product->id }}" class="border-gray-300 text-center" placeholder="Type" /> 

                <x-form-input class="border-gray-300 bg-blue-gray-100" disabled /> 
                <x-form-input disabled wire:model="total.{{ $product->id }}" class="border-gray-300 text-right bg-blue-gray-100" /> 
            </div>
        @endforeach
    </div>

    <div class=" bg-white p-4 mt-4 flex justify-end">
        

        <x-msg-success sKey="successPO" />
        <x-btn-primary wire:click.prevent="submitPoProduct" > ADD PO </x-btn-primary>
    </div>
</div>
