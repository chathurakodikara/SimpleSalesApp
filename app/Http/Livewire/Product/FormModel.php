<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class FormModel extends Component
{
    protected $listeners  = ['createProduct', 'editProduct'];
    public $modelProductForm = false;
    public $formTitle = null;

    public  $code, $name, $mrp, $distributor_price, $weight_volume, $unit;
  
    public $sku_id = null;

     protected function rules()
    {
        return [
            'code' =>'required|unique:products,code,'.$this->sku_id,
            'name' => 'required|max:250|string',
            'mrp' => 'required|numeric|max:999999.99',
            'distributor_price' => 'required|numeric|max:999999.99',
            'weight_volume' => 'required|numeric|max:999999.99',
            'unit' => 'required|in:nos,Kg,l',
        ];
    }


    public function createProduct()
    {
        $this->formReset();

        $this->modelProductForm = true;
        $this->formTitle = 'Add SKU';
    }

    public function editProduct(Product $product)
    {
        $this->resetErrorBag();
        $this->modelProductForm = true;
        $this->formTitle = 'Update SKU';

        $this->sku_id = $product->id;

        $this->code = $product->code;
        $this->name = $product->name;
        $this->mrp = $product->mrp;
        $this->distributor_price = $product->distributor_price;
        $this->weight_volume = $product->weight_volume;
        $this->unit = $product->unit;

    }

    public function store()
    {
      
        $this->validate();

        Product::updateOrCreate(['id' => $this->sku_id ?? null ], [
            'code' => $this->code,
            'name' => $this->name,
            'mrp' => $this->mrp,
            'distributor_price' => $this->distributor_price,
            'weight_volume' => $this->weight_volume,
            'unit' => $this->unit,
            'user_id' =>auth()->id()
        ]);

        
        session()->flash('successProduct', $this->sku_id ? 'Product Updated!' : 'Product Created!');
        $this->emitTo('product.index', 'refreshIndex');
        $this->formReset();
    }

    public function formReset()
    {
        $this->reset(['code', 'name', 'mrp', 'distributor_price', 'weight_volume', 'unit']);
        $this->resetErrorBag();

        $this->sku_id = null;
    }

    public function render()
    {
        return view('livewire.product.form-model');
    }
}
