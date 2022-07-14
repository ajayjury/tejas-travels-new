<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleType;

class Coupon extends Model
{
    use HasFactory;
    protected $table="coupons";

    public function VehicleTypes()
    {
        return $this->belongsToMany(VehicleType::class, 'couponvehicletypes', 'coupon_id', 'vehicletype_id');
    }

    public function GetVehicleTypesId(){
        return $this->VehicleTypes()->pluck('vehicletypes.id')->toArray();
    }

    public function GetVehicleTypesName(){
        return $this->VehicleTypes()->pluck('vehicletypes.name');
    }

}
