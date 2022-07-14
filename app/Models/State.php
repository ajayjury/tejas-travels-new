<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table="states";

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function City()
    {
        return $this->hasMany('App\Models\City');
    }

    public function SubCity()
    {
        return $this->hasMany('App\Models\SubCity');
    }

    public function Airport()
    {
        return $this->hasMany('App\Models\Airport');
    }

    public function AirportRide()
    {
        return $this->hasMany('App\Models\AirportRide');
    }

    public function Transporter()
    {
        return $this->hasMany('App\Models\Transporter');
    }
    
    public function Festival()
    {
        return $this->hasMany('App\Models\Festival');
    }

    public function LocalRide()
    {
        return $this->hasMany('App\Models\LocalRide');
    }
}
