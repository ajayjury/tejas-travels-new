<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleTypesSeo;
use App\Models\VehicleSeo;

class ContentLayout extends Model
{
    use HasFactory;
    protected $table="contentlayout";

    public function VehicleTypesSeos()
    {
        return $this->belongsToMany(VehicleTypesSeo::class, 'vehicletypesseocontentlayouts', 'vehicletypesseo_id', 'contentlayout_id');
    }

    public function GetVehicleTypesSeosId(){
        return $this->VehicleTypesSeos()->pluck('vehicletypesseos.id')->toArray();
    }

    public function GetVehicleTypesSeosName(){
        return $this->VehicleTypesSeos()->pluck('vehicletypesseos.name');
    }

    public function VehicleSeos()
    {
        return $this->belongsToMany(VehicleSeo::class, 'vehicleseocontentlayouts', 'vehicleseo_id', 'contentlayout_id');
    }

    public function GetVehicleSeosId(){
        return $this->VehicleSeos()->pluck('vehicleseos.id')->toArray();
    }

    public function GetVehicleSeosName(){
        return $this->VehicleSeos()->pluck('vehicleseos.name');
    }
}
