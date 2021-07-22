<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Models\User;
use App\Models\Zone;
use App\Models\Region;
use Livewire\Component;
use App\Models\Territory;
use App\Models\PurchaseOrder;

class CreateHeader extends Component
{
    // public $reagonList,  $territoryList, $distributeryList;
    protected $listeners  = ['poProductQty'];

    public $zones = [], $regions = [], $territories = [], $distributers = [];
    public $zone_id, $region_id, $territory_id, $distributer_id, $remarks, $poProducts;
    public function mount()
    {
        $this->zones = Zone::all();
        $this->distributers = User::all();

    }

    public function updated()
    {
        if ($this->zone_id) {            
            $this->regions = Region::where('zone_id', $this->zone_id)->get();
        }
        if ($this->region_id) {
            $this->territories = Territory::where('region_id', $this->region_id)->get();
        }

    }

    public function poProductQty($data)
    {
        // $this->poProducts = $data;
        
        if (empty($data)) {
            session()->flash('error', 'Product Array is empty !');
            return;
        }


        $this->validate([
            'zone_id' => 'required|exists:zones,id',
            'region_id' => 'required|exists:regions,id',
            'territory_id' => 'required|exists:territories,id',
            'distributer_id' => 'required|exists:users,id',
            'remarks' => 'nullable|max:180',
        ]);


        $lastPurchaseOrder = PurchaseOrder::max('id');
        $digits = str_pad($lastPurchaseOrder ? $lastPurchaseOrder + 1 : 1 , 3,"0",STR_PAD_LEFT);
        $fullPoNumber = 'TEPO'.$digits ;


        $purchaseOrder = PurchaseOrder::create([
            'no' => $fullPoNumber,
            'territory_id' => $this->territory_id,
            'user_id' => $this->distributer_id,
            'total' => 123,
            'remarks' => $this->remarks
        ]);

        $purchaseOrder->products()->sync($data);

    }
    public function render()
    {
        return view('livewire.purchase-order.create-header');
    }
}
