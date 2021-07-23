<?php

namespace App\Http\Livewire\PurchaseOrder;

use Livewire\Component;
use Mockery\Matcher\Type;
use App\Models\PurchaseOrder;

class Create extends Component
{
    public $po, $loadedPo;

    public function mount()
    {
        $this->loadedPo = PurchaseOrder::with('products', 'territory.region')->find($this->po);
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
 
    public function render()
    {
    
        return view('livewire.purchase-order.create');
    }
}
