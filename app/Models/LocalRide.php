<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;

class LocalRide extends Model
{
    use HasFactory;
    protected $table="localrides";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function Cities()
    {
        return $this->belongsToMany(City::class, 'localridecities', 'localride_id');
    }

    public function GetCitiesId(){
        return $this->Cities()->pluck('cities.id')->toArray();
    }

    public function GetCitiesName(){
        return $this->Cities()->pluck('cities.name');
    }

    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function PackageType()
    {
        return $this->belongsTo('App\Models\PackageType', 'packagetype_id');
    }

    public function SpecialFareLocalRide()
    {
        return $this->hasMany('App\Models\SpecialFareLocalRide', 'localride_id');
    }

    public function discountAmount($distance=null) {
        return number_format(($this->discount/100)*($this->base_price),2,'.','');
    }
    
    public function gstAmount($distance=null) {
        return number_format(($this->gst/100)*($this->base_price),2,'.','');
    }
    
    public function advanceAmount($distance=null) {
        return number_format(($this->advance_during_booking/100)*($this->finalAmount($distance)),2,'.','');
    }
    
    public function totalAmount($distance=null) {
        return $this->base_price;
    }
    
    public function finalAmount($distance=null) {
        return number_format((($this->totalAmount($distance)+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))-$this->discountAmount($distance))+$this->gstAmount($distance)+$this->driver_charges_per_day,2,'.','');
    }
}
