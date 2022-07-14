<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transporter;
use App\Models\Festival;
use App\Models\LocalRide;

class City extends Model
{
    use HasFactory;
    protected $table="cities";

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function State()
    {
        return $this->belongsTo('App\Models\State');
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

    public function Transporters()
    {
        return $this->belongsToMany(Transporter::class, 'transportercities');
    }
    
    public function Festivals()
    {
        return $this->belongsToMany(Festival::class, 'festivalcities');
    }
    
    public function LocalRides()
    {
        return $this->belongsToMany(LocalRide::class, 'localridecities');
    }
}
