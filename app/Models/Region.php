<?php

namespace App\Models;

use App\Models\Zone;
use App\Models\Territory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function territories()
    {
        return $this->hasMany(Territory::class);
    }

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

}
