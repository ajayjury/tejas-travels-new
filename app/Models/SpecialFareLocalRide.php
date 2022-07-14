<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialFareLocalRide extends Model
{
    use HasFactory;
    protected $table="specialfarelocalrides";

    public function LocalRide()
    {
        return $this->belongsTo('App\Models\LocalRide', 'localride_id');
    }
}
