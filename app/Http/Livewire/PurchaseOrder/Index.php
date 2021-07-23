<?php

namespace App\Http\Livewire\PurchaseOrder;

use Livewire\Component;
use App\Models\PurchaseOrder;

class Index extends Component
{
    public $regions = [];
    public $territories = [];

    
    public function render()
    {
        
        $purchaseOrders = PurchaseOrder::where(function ($q)
        {
            if (!auth()->user()->isAdmin()) {
                $q->where('user_id', auth()->id());
            }
        
        })->get();
        return view('livewire.purchase-order.index', ['purchaseOrders' => $purchaseOrders]);
    }
}
