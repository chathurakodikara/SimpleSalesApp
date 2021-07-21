<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners  = ['refreshIndex' => 'render', 'searchIndex'];

    public $search;

    public function searchIndex($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    
    public function render()
    {
        $regions = Region::with('zone')->where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhereHas('zone', function ($q)
            {
                $q->where('short_description', 'LIKE', '%'.$this->search.'%');
            })
            ->paginate(10);
        return view('livewire.region.index', ['regions' => $regions]);
    }
}
