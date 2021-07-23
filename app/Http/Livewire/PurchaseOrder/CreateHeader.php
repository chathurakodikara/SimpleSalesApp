<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Models\User;
use App\Models\Zone;
use App\Models\Region;
use Livewire\Component;
use App\Models\Territory;
use Illuminate\Support\Str;
use App\Models\PurchaseOrder;

class CreateHeader extends Component
{
    // public $reagonList,  $territoryList, $distributeryList;
    protected $listeners  = ['poProductQty'];

    public $zones = [], $regions = [], $territories = [], $distributers = [];
    public $zone_id, $region_id, $territory_id, $distributer_id, $remarks, $poProducts, $po_no, $date;

    public $po;
    public function mount()
    {
        $this->zones = Zone::all();
        $this->distributers = User::all();
        
        $this->updatePo($this->po);

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
        $digits = Str::padLeft($lastPurchaseOrder ? $lastPurchaseOrder + 1 : 1 , 3, '0'); 
        $fullPoNumber = 'TEPO'.$digits ;


        $purchaseOrder = PurchaseOrder::create([
            'no' => $fullPoNumber,
            'territory_id' => $this->territory_id,
            'user_id' => $this->distributer_id,
            'remarks' => $this->remarks
        ]);

        $purchaseOrder->products()->sync($data);

        session()->flash('successPO', $this->po ? 'PO Updated!' : 'PO Created!');

        return redirect()->route('purchase-orders.edit', $purchaseOrder);

    }

    public function updatePo($po)
    {
        if (!$po) {
            return ;
        }
 
        $this->po_no = $po->no;
        $this->date = $po->created_at->format('d-m-Y');
        
        $this->zone_id = $po->territory->region->zone_id;
        $this->region_id = $po->territory->region->id;
        $this->territory_id = $po->territory->id;

        $this->updated();
        $this->distributer_id = $po->user_id;
        $this->remarks = $po->remarks;

    }

    public function render()
    {
        return view('livewire.purchase-order.create-header');
    }
}
