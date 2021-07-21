<?php

namespace App\Http\Livewire\Region;

use App\Models\Zone;
use App\Models\Region;
use Livewire\Component;

class FormModel extends Component
{
    public $zones = [];

    protected $listeners  = ['create', 'edit'];

    protected $rules = [
        'zone_id' => 'required|exists:zones,id',
        'region_name' => 'required|max:150',
    ];

    public $formTitle = null;
    public $modelRegionForm = false;

    public $region_id, $zone_id, $region_name, $region_code;

    public function mount()
    {
        $this->zones = Zone::all();
    }

    public function create()
    {
        $this->formReset();

        $this->modelRegionForm = true;
        $this->formTitle = 'Add Region';
    }

    public function store()
    {
        $this->validate();

        Region::updateOrCreate(['id' => $this->region_id ?? null ],[
            'name' => $this->region_name,
            'zone_id' => $this->zone_id,
        ]);


        session()->flash('successRegion', $this->region_id ? 'Region Updated!' : 'Region Created!');

        $this->emitTo('region.index', 'refreshIndex');
        $this->formReset();

    }

    public function formReset()
    {
        $this->reset(['region_name', 'zone_id', 'region_code']);
        $this->resetErrorBag();

        $this->region_id = null;
    }

    public function edit(Region $region)
    {
        $this->formReset();

        $this->formTitle = 'Update Region';

        $this->modelRegionForm = true;
        $this->region_id = $region->id;
        $this->region_code = str_pad($this->region_id,3,"0", STR_PAD_LEFT);


        $this->zone_id = $region->zone_id;
        $this->region_name = $region->name;

    }

    public function render()
    {
        return view('livewire.region.form-model');
    }
}
