<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;
    protected $table="airports";

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }
    
    public function AirportRide()
    {
        return $this->hasMany('App\Models\AirportRide');
    }
}
