<?php

namespace App\Http\Livewire\Material;

use Livewire\Component;
use App\Models\Category;
use App\Models\Material;

class Form extends Component
{
    protected $listeners  = ['createMaterial'];

    public $modelMaterialForm = false;

    public $description, $code, $unit, $unit_cost;
    public $categories = [];

    public $edit_material_id = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function createMaterial()
    {
        $this->modelMaterialForm = true;
    }

    public function storeMaterial()
    {
        $this->validate([
            'description' => 'required|max:250|string',
            'code' =>'required|unique:materials,code,'.$this->edit_material_id,
            'unit_cost' => 'required|numeric|max:99999.99'
        ]);

        Material::updateOrCreate(['id' => $edit_material_id ?? null ], [
            'description' => $this->description,
            'code' => $this->code,
            'unit_cost' => $this->unit_cost,
            'user_id' =>auth()->id()
        ]);


        $this->emitTo('material.index', 'refreshIndex');


    }

    public function render()
    {
        return view('livewire.material.form');
    }
}
