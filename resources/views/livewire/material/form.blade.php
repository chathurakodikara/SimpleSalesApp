<div>
    <x-jet-dialog-modal wire:model="modelMaterialForm" maxWidth="2xl">
        <x-slot name="title"> Create a Material </x-slot>
        <x-slot name="content">

            <div class=" grid grid-cols-3 gap-2 gap-x-4">

                <x-form-label class=" col-span-3">
                    <span>Description</span>
                    <x-form-textarea rows="3" wire:model="description" for='description'> </x-form-textarea>
                    <x-form-error for='description' />
                </x-form-label>

                <x-form-label>
                    <span>Code</span>
                    <x-form-input wire:model="code" for='code'/>
                    <x-form-error for='code' />
                </x-form-label>


                <x-form-label>
                    <span>Unit Cost</span>
                    <x-form-input wire:model="unit_cost" for='code'/>
                    <x-form-error for='unit_cost' />
                </x-form-label>

            </div>
                   
        </x-slot>
        <x-slot name="footer">
            <div class=" flex w-full justify-end">
                <x-btn-primary wire:click.prevent="storeMaterial()">Add</x-btn.prymary>
            </div>

        </x-slot>
    </x-jet-dialog-modal>
</div>