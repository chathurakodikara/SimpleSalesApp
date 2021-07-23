<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['subtotal', 'order_time', 'order_date'];

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

    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOrderDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getOrderTimeAttribute()
    {
        return $this->created_at->format('h:i A');
    }

}
