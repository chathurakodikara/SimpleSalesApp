<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchIndex extends Component
{
    public $ePath, $search ;

    public function updatedSearch()
    {
        $this->emitTo($this->ePath, 'searchIndex', $this->search);
    }
    public function render()
    {
        return view('livewire.search-index');
    }
}
