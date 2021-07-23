<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Region;
use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Territory extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

}
