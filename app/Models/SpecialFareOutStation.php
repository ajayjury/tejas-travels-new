<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialFareOutStation extends Model
{
    use HasFactory;
    protected $table="specialfareoutstations";

    public function OutStation()
    {
        return $this->belongsTo('App\Models\OutStation', 'outstation_id');
    }
}
