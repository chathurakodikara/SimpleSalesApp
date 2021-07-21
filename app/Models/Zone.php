<?php

namespace App\Models;

use App\Models\Region;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function territory()
    {
        return $this->hasOneThrough(Territory::class, Region::class);
    }


}
