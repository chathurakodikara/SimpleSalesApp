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

    public $zone_code, $long_description, $short_description;

    public function create()
    {
        $this->formReset();

        $this->modelZoneForm = true;
        $this->formTitle = 'Add Zone';
    }

    public function store()
    {
        $this->validate();

        Zone::updateOrCreate(['id' => $this->zone_code ?? null ],[
            'long_description' => $this->long_description,
            'short_description' => $this->short_description,
        ]);

        
        session()->flash('successZone', $this->zone_code ? 'Zone Updated!' : 'Zone Created!');
        $this->emitTo('zone.index', 'refreshIndex');
        
        $this->formReset();

    }

    public function formReset()
    {
        $this->resetErrorBag();

        $this->reset(['long_description', 'short_description']);
        $this->zone_code = null;
    }

    public function edit(Zone $zone)
    {
        $this->formReset();

        $this->formTitle = 'Update Zone';

        $this->modelZoneForm = true;

        $this->zone_code = $zone->id;
        $this->long_description = $zone->long_description;
        $this->short_description = $zone->short_description;
    }



    public function render()
    {
        return view('livewire.zone.form-model');
    }
}
