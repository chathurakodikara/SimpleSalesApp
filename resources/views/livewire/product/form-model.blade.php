<div>
    <x-jet-dialog-modal wire:model="modelProductForm" maxWidth="2xl">
        <x-slot name="title"> 
            <div class=" flex items-center justify-between gap-2">
                {{ $formTitle }} 

     
                <x-msg-success sKey="successProduct" />

            </div>
        </x-slot>
        <x-slot name="content">

            <div>

                <x-form-label>
                    <div>SKU ID <span class=" req">*</span></div>
                    <x-form-input  class=" bg-gray-100 border-opacity-20" wire:model="sku_id" for='' disabled/>
                </x-form-label>

                <x-form-label>
                    <div>SKU Code <span class=" req">*</span></div>
                    <x-form-input wire:model="code" for='code'/>
                    <x-form-error for='code' />
                </x-form-label>

                <x-form-label>
                    <div>SKU Name <span class="req">*</span></div>
                    <x-form-input class="col-span-3" wire:model="name" for='name'/>
                    <x-form-error for='name' />
                </x-form-label>

                <x-form-label>
                    <div>MRP <span class="req">*</span></div>
                    <x-form-input wire:model="mrp" for='mrp'/>
                    <x-form-error for='mrp' />
                </x-form-label>

                <x-form-label>
                    <div>Distributor Price <span class="req">*</span></div>
                    <x-form-input wire:model="distributor_price" for='distributor_price'/>
                    <x-form-error for='distributor_price'  />
                </x-form-label>

                <x-form-label>
                    <div>Weight/Volume <span class="req">*</span></div>
                    <x-form-input wire:model="weight_volume" for='weight_volume'/>
                    <x-form-select wire:model="unit" for='unit'>
                        <option value=""></option>
                        <option value="nos">nos</option>
                        <option value="Kg">Kg</option>
                        <option value="l">l</option>
                    </x-form-select>
                    <div class="col-start-2 col-span-3">
                        <x-form-error for='name' />
                        <x-form-error for='unit' />
                    </div>
                </x-form-label>
                
            </div>
                   
        </x-slot>
        <x-slot name="footer">
            <div class=" flex w-full justify-end">
                <x-btn-primary wire:click.prevent="store()">Add</x-btn.prymary>
            </div>

        </x-slot>
    </x-jet-dialog-modal>
</div>