<?php

namespace App\Http\Livewire\Territory;

use Livewire\Component;
use App\Models\Territory;
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
        // $aa = Territory::with('region.zone')->get();

        // dd($aa);
        $territories = Territory::with( 'region.zone')
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhereHas('region.zone', function ($zone)
            {
                $zone->where('short_description', 'LIKE', '%'.$this->search.'%');
            })
            ->orWhereHas('region', function ($region)
            {
                $region->where('name', 'LIKE', '%'.$this->search.'%');
            })
            ->paginate(10);

        return view('livewire.territory.index', ['territories' => $territories] );
    }
}
