<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;

class VehicleType extends Model
{
    use HasFactory;
    protected $table="vehicletypes";

    public function Vehicle()
    {
        return $this->hasMany('App\Models\Vehicle', 'vehicletype_id');
    }

    public function LocalRide()
    {
        return $this->hasMany('App\Models\LocalRide');
    }

    public function Coupons()
    {
        return $this->belongsToMany(Coupon::class, 'couponvehicletypes', 'coupon_id', 'vehicletype_id');
    }

    public function AirportRide()
    {
        return $this->hasMany('App\Models\AirportRide');
    }
}
