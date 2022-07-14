<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\ListLayout;
use App\Models\ContentLayout;

class VehicleTypesSeo extends Model
{
    use HasFactory;
    protected $table="vehicletypesseos";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }
    
    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function Vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicletypesseovehicles', 'vehicletypesseo_id', 'vehicle_id');
    }

    public function GetVehiclesId(){
        return $this->Vehicles()->pluck('vehicles.id')->toArray();
    }

    public function GetVehiclesName(){
        return $this->Vehicles()->pluck('vehicles.name');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function VehicleTypeSeoImage()
    {
        return $this->hasMany('App\Models\VehicleTypeSeoImage', 'vehicletypesseo_id');
    }

    public function ListLayouts()
    {
        return $this->belongsToMany(ListLayout::class, 'vehicletypesseolistlayouts', 'vehicletypesseo_id', 'listlayout_id');
    }

    public function GetListLayoutsId(){
        return $this->ListLayouts()->pluck('listlayout.id')->toArray();
    }

    public function GetListLayoutsName(){
        return $this->ListLayouts()->pluck('listlayout.name');
    }
    
    // public function ContentLayouts()
    // {
    //     return $this->belongsToMany(ContentLayout::class, 'vehicletypesseocontentlayouts', 'vehicletypesseo_id', 'contentlayout_id');
    // }

    // public function GetContentLayoutsId(){
    //     return $this->ContentLayouts()->pluck('contentlayout.id')->toArray();
    // }

    // public function GetContentLayoutsName(){
    //     return $this->ContentLayouts()->pluck('contentlayout.name');
    // }

    public function VehicleTypeSeoContentLayout()
    {
        return $this->hasMany('App\Models\VehicleTypeSeoContentLayout', 'vehicletypesseo_id');
    }

    public function SubCities()
    {
        return $this->belongsToMany(SubCity::class, 'vehicletypeseosubcities', 'vehicletypeseo_id', 'subcity_id');
    }

    public function GetSubCitiesId(){
        return $this->SubCities()->pluck('subcities.id')->toArray();
    }

    public function GetSubCitiesName(){
        return $this->SubCities()->pluck('subcities.name');
    }
}
