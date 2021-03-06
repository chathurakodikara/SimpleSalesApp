<?php

namespace App\Models;

use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purcheseOrders()
    {
        return $this->belongsToMany(PurchaseOrder::class)
            ->withPivot('quantity', 'unit_price')
            ->withTimestamps();
    }


}
