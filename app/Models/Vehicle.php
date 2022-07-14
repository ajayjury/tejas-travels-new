<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenity;
use App\Models\Transporter;

class Vehicle extends Model
{
    use HasFactory;
    protected $table="vehicles";

    public function VehicleDisplayImage()
    {
        return $this->hasMany('App\Models\VehicleDisplayImage');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function Amenities()
    {
        return $this->belongsToMany(Amenity::class, 'vehicleamenities');
    }

    public function GetAmenitiesId(){
        return $this->Amenities()->pluck('amenities.id')->toArray();
    }

    public function Transporters()
    {
        return $this->belongsToMany(Transporter::class, 'transportervehicles');
    }

    public function LocalRide()
    {
        return $this->hasMany('App\Models\LocalRide');
    }

    public function AirportRide()
    {
        return $this->hasMany('App\Models\AirportRide');
    }

    public function OutStation()
    {
        return $this->hasMany('App\Models\OutStation');
    }
}
