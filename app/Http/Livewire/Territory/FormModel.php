<?php

namespace App\Http\Livewire\Territory;

use App\Models\Zone;
use App\Models\Region;
use Livewire\Component;
use App\Models\Territory;
use Illuminate\Validation\Rule;

class FormModel extends Component
{
    protected $listeners  = ['create', 'edit'];

    protected $rules = [
        'territory_name' => 'required|max:190',
        'region_id' => 'required|exists:regions,id',
    ];

    public $zones = [];
    public $regions = [];
    public $formTitle = '';
    public $modelTerritoryForm = false;

    public $zone_id, $region_id, $territory_code, $territory_name, $territory_id;

    public function mount()
    {
        $this->zones = Zone::all();
    }

    public function updatedZoneId()
    {
        $this->regions = Region::where('zone_id', $this->zone_id)->get();
    }

    public function create()
    {
        $this->formReset();

        $this->modelTerritoryForm = true;
        $this->formTitle = 'Add Territory';
    }
    

    public function store()
    {
        $this->validate();

        Territory::updateOrCreate(['id' => $this->territory_id ?? null ],[
            'name' => $this->territory_name,
            'region_id' => $this->region_id,
        ]);


        session()->flash('successTerritory', $this->territory_id ? 'Territory Updated!' : 'Territory Created!');

        $this->emitTo('territory.index', 'refreshIndex');
        $this->formReset();

    }

    public function formReset()
    {
        $this->resetErrorBag();

        $this->reset(['zone_id', 'region_id', 'territory_name','territory_code']);
        $this->territory_id = null;
    }

    public function edit(Territory $territory)
    {
        $this->formReset();


        $this->formTitle = 'Update Territory';

        $this->modelTerritoryForm = true;

        $this->zone_id = $territory->region->zone->id;

        $this->updatedZoneId();
        $this->region_id = $territory->region_id;
        
        $this->territory_id = $territory->id;
        $this->territory_code = str_pad($this->territory_id,3,"0", STR_PAD_LEFT);

        $this->territory_name = $territory->name;

    }

    public function render()
    {
        return view('livewire.territory.form-model');
    }
}
