<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;

class OutStation extends Model
{
    use HasFactory;
    protected $table="outstations";

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

    public function SpecialFareOutStation()
    {
        return $this->hasMany('App\Models\SpecialFareOutStation', 'outstation_id');
    }

    public function discountAmount($distance) {
        // return $distance;
        return number_format((floatval($this->discount)/100)*(floatval($this->round_price_per_km) * floatval($distance)),2,'.','');
    }
    
    public function gstAmount($distance) {
        return number_format((floatval($this->gst)/100)*(floatval($this->round_price_per_km) * floatval($distance)),2,'.','');
    }
    
    public function advanceAmount($distance) {
        return number_format((floatval($this->advance_during_booking)/100)*(floatval($this->finalAmount($distance))),2,'.','');
    }
    
    public function totalAmount($distance) {
        return floatval($this->round_price_per_km) * floatval($distance);
    }
    
    public function finalAmount($distance) {
        return number_format((floatval($this->totalAmount($distance))+(!empty($this->driver_charges_per_day) ? $this->driver_charges_per_day : 0.0))+(floatval($this->gstAmount($distance))-floatval($this->discountAmount($distance))),2,'.','');
    }
}
