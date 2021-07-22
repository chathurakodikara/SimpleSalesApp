<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['subtotal'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'unit_price')
            ->withTimestamps();
    }

    public function getSubtotalAttribute() {

        return $this->products->map(function ($product){
            return $product->pivot->quantity * $product->pivot->unit_price;
        })->sum();

    }

}
