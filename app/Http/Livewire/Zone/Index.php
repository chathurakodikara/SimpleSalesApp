<?php

namespace App\Http\Livewire\Zone;

use App\Models\Zone;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners  = ['refreshIndex'=> 'render' , 'searchIndex'];

    public $search;

    public function searchIndex($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    public function render()
    {
        $zones = Zone::where('short_description', 'LIKE', '%'.$this->search.'%')
            ->orWhere('long_description', 'LIKE', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.zone.index', ['zones' => $zones]);
    }
}
