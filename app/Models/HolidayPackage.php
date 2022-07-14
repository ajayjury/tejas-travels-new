<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenity;

class HolidayPackage extends Model
{
    use HasFactory;
    protected $table="holidaypackages";

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    
    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }
    
    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function Amenities()
    {
        return $this->belongsToMany(Amenity::class, 'holidaypackageamenities', 'holidaypackage_id', 'amenity_id');
    }

    public function GetAmenitiesId(){
        return $this->Amenities()->pluck('amenities.id')->toArray();
    }

    public function GetAmenitiesName(){
        return $this->Amenities()->pluck('amenities.name');
    }

    public function HolidayPackageTourPlan()
    {
        return $this->hasMany('App\Models\HolidayPackageTourPlan', 'holidaypackage_id');
    }
}
