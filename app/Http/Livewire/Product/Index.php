<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $listeners  = ['refreshIndex', 'searchIndex'];

    public $search;

    public function searchIndex($search)
    {
        $this->search = $search;
        $this->resetPage();
    }
    public function refreshIndex()
    {
        $this->render();
    }
    public function render()
    {
        $products = Product::where('name', 'LIKE', '%'.$this->search.'%')
            ->orWhere('code', 'LIKE', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.product.index', ['products' => $products ]);
    }
}
