<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;

class AirportRide extends Model
{
    use HasFactory;
    protected $table="airportrides";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }
    
    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function SpecialFareAirportRide()
    {
        return $this->hasMany('App\Models\SpecialFareAirportRide', 'airportride_id');
    }

    public function SubCities()
    {
        return $this->belongsToMany(SubCity::class, 'airportridesubcities', 'airportride_id', 'subcity_id');
    }

    public function GetSubCitiesId(){
        return $this->SubCities()->pluck('subcities.id')->toArray();
    }

    public function GetSubCitiesName(){
        return $this->SubCities()->pluck('subcities.name');
    }

    public function Airport()
    {
        return $this->belongsTo('App\Models\Airport', 'airport_id');
    }
}
