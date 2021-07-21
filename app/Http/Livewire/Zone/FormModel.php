<?php

namespace App\Http\Livewire\Zone;

use App\Models\Zone;
use Livewire\Component;

class FormModel extends Component
{
    protected $listeners  = ['create', 'edit'];

    protected $rules = [
        'long_description' => 'required|max:250',
        'short_description' => 'required|max:50',
    ];

    public $formTitle = null;
    public $modelZoneForm = false;

    public $zone_id, $long_description, $short_description, $zone_code;

    public function create()
    {
        $this->formReset();

        $this->modelZoneForm = true;
        $this->formTitle = 'Add Zone';
    }

    public function store()
    {
        $this->validate();

        Zone::updateOrCreate(['id' => $this->zone_id ?? null ],[
            'long_description' => $this->long_description,
            'short_description' => $this->short_description,
        ]);

        
        session()->flash('successZone', $this->zone_id ? 'Zone Updated!' : 'Zone Created!');
        $this->emitTo('zone.index', 'refreshIndex');
        
        $this->formReset();

    }

    public function formReset()
    {
        $this->resetErrorBag();

        $this->reset(['long_description', 'short_description', 'zone_code']);
        $this->zone_id = null;
    }

    public function edit(Zone $zone)
    {
        $this->formReset();

        $this->formTitle = 'Update Zone';

        $this->modelZoneForm = true;

        $this->zone_id = $zone->id;
        $this->zone_code = str_pad($this->zone_id,3,"0", STR_PAD_LEFT);
        $this->long_description = $zone->long_description;
        $this->short_description = $zone->short_description;
    }



    public function render()
    {
        return view('livewire.zone.form-model');
    }
}
