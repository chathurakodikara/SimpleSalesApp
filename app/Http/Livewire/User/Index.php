<?php

namespace App\Http\Livewire\User;

use App\Models\User;
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
        $users = User::where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('nic', 'LIKE', '%'.$this->search.'%')
            ->orWhere('mobile', 'LIKE', '%'.$this->search.'%')
            ->orWhere('email', 'LIKE', '%'.$this->search.'%')
            ->orWhereHas('territory', function ($territory)
            {
                $territory->where('territory_id', 'LIKE', '%'.$this->search.'%');
            })
            ->paginate(10);
        return view('livewire.user.index', ['users' => $users]);
    }
}
