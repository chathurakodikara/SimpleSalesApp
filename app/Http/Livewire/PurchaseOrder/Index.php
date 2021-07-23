<?php

namespace App\Http\Livewire\PurchaseOrder;

use Carbon\Carbon;
use App\Models\Region;
use Livewire\Component;
use App\Models\Territory;
use App\Models\PurchaseOrder;

class Index extends Component
{
    public $regions = [];
    public $territories = [];

    public $region_id, $territory_id, $po_no, $date_from, $date_to;

    public function mount()
    {
        $this->regions = Region::all();
    }

    public function updatedRegionId()
    {
        $this->territories = Territory::where('region_id', $this->region_id)->get();
    }

    public function render()
    {
        $date_from = new Carbon($this->date_from);
        $date_to = new Carbon($this->date_to);

        // dd($date_from);

        $purchaseOrders = PurchaseOrder::with('products', 'territory.region')->where(function ($q)
        {   
            
            if ($this->region_id) {
                $q->whereHas('territory', function ($territory)
                {
                    $territory->where('region_id', $this->region_id);
                });
            }

            if ($this->territory_id) {
                $q->where('territory_id', $this->territory_id);
            }
            if (!auth()->user()->isAdmin()) {
                $q->where('user_id', auth()->id());
            }
        
        })->where('no', 'LIKE', '%'.$this->po_no.'%')
        ->whereBetween('created_at', [$date_from->format('Y-m-d')." 00:00:00", $date_to->format('Y-m-d')." 23:59:59"])
        ->get();
        return view('livewire.purchase-order.index', ['purchaseOrders' => $purchaseOrders]);
    }
}



// $result = ModelName::whereBetween('created_at', ->get();