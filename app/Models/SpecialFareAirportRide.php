<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialFareAirportRide extends Model
{
    use HasFactory;
    protected $table="specialfareairportrides";

    public function AirportRide()
    {
        return $this->belongsTo('App\Models\AirportRide', 'airportride_id');
    }
}
