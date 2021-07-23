<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Models\Product;
use Livewire\Component;

class CreateProductQty extends Component
{

    protected $listeners  = ['loadProducts'];

    public $products;
    public $product_id, $distributor_price, $quantity, $total, $name, $code ;
    public $po, $poProducts ;

    public function mount()
    {
        $this->products = Product::all();

        if ($this->products) {

            $this->products->map(function ($q) {
                $this->product_id[$q->id] = $q->id;
                $this->distributor_price[$q->id] = $q->distributor_price;
                $this->name[$q->id] =  $q->name;
                $this->code[$q->id] =  $q->code;
                $this->quantity[$q->id] =  0;
                $this->total[$q->id] =  0;
                // ;
                return ;
            });
        }

        $this->poProducts = $this->po->products ?? null;

        $this->showPrePo();


    }

    public function loadProducts($loadProducts)
    {
        dd($loadProducts);
    }

    public function updatedQuantity()
    {
        $this->products->map(function ($product) {
            $this->quantity[$product->id] = (float)$this->quantity[$product->id] ?? 0;

            $this->total[$product->id] = $this->distributor_price[$product->id] * (float)$this->quantity[$product->id];
            return ;
        });
  
    }

    public function submitPoProduct()
    {

        $data = [];
        foreach ($this->quantity as $product => $quantity) {
             if ($quantity > 0) {
                $data[$product] =  [
                    // 'product_id' => $product,
                    'quantity' => $quantity,
                    'unit_price' => $this->distributor_price[$product],
                ];
            }
        }
       
        $this->emitTo('purchase-order.create-header', 'poProductQty', $data);
    }

    public function showPrePo()
    {
        if ($this->poProducts) {

            $this->poProducts->map(function ($product)
            {
                $pivot = $product->pivot;
                $this->quantity[$product->id] = $pivot->quantity;
                $this->total[$product->id] =  $pivot->quantity * $pivot->unit_price;
            });
        }
    }

    public function render()
    {
        return view('livewire.purchase-order.create-product-qty');
    }
}
