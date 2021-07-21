<div>
    <x-jet-dialog-modal wire:model="modelUserForm" maxWidth="2xl">
        <x-slot name="title"> 
            {{ $formTitle }} 
        </x-slot>
        <x-slot name="content">
            <div>

                <x-form-label>
                    <div>Name <span class=" req">*</span></div>
                    <x-form-input class="col-span-2"  wire:model="name" for='name' />
                    <x-form-error for='name' />

                </x-form-label>

                <x-form-label>
                    <div>NIC <span class="req">*</span></div>
                    <x-form-input class="col-span-2" wire:model="nic" for='nic'/>
                    <x-form-error for='nic' />
                </x-form-label>

                <x-form-label>
                    <div>Address <span class="req">*</span></div>
                    <x-form-input class="col-span-3" wire:model="address" for='address'/>
                    <x-form-error for='address' />
                </x-form-label>

                <x-form-label>
                    <div>Mobile <span class="req">*</span></div>
                    <x-form-input class="col-span-2" wire:model="mobile" for='mobile'/>
                    <x-form-error for='mobile' />
                </x-form-label>

                <x-form-label>
                    <div>Email </div>
                    <x-form-input class="col-span-2" wire:model="email" for='email'/>
                    <x-form-error for='email' />
                </x-form-label>

                <x-form-label>
                    <div>Gender </div>
                    <x-form-select wire:model="gender" for='gender'>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </x-form-select>
                    <x-form-error for='gender' />
                </x-form-label>

                <x-form-label>
                    <div>Territory <span class=" req">*</span></div>
                    <x-form-select class="capitalize" wire:model="territory_id" for='territory_id'>
                        <option value="">Select</option>
                        @foreach ($territories as $territory)
                        <option value="{{ $territory->id }}">{{ $territory->name }}</option>
                        @endforeach
                    </x-form-select>
                    <x-form-error for='territory_id' />
                </x-form-label>

                <x-form-label>
                    <div>Username <span class="req">*</span></div>
                    <x-form-input class="col-span-2" wire:model="username" for='username'/>
                    <x-form-error for='username' />
                </x-form-label>

                <x-form-label>
                    <div>Password <span class="req">*</span></div>
                    
                    <x-form-input-password  class="col-span-2" wire:model="password" for='password'/>
                    <x-form-error for='password' />
                </x-form-label>

            </div>      
        </x-slot>
        <x-slot name="footer">
            <div class=" flex justify-between items-center w-full gap-x-2">
                <x-msg-success sKey="successRegion" />
                <x-btn-primary class=" ml-auto" wire:click.prevent="store()">Save</x-btn.prymary>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>