<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\SubCity;
use App\Models\HolidayPackage;
use App\Models\ListLayout;
use App\Models\ContentLayout;

class HolidayPackageSeo extends Model
{
    use HasFactory;
    protected $table="holidaypackageseos";

    public function State()
    {
        return $this->belongsTo('App\Models\State');
    }
    
    public function City()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function HolidayPackage()
    {
        return $this->belongsTo('App\Models\HolidayPackage', 'holidaypackage_id');
    }

    public function HolidayPackageSeoImage()
    {
        return $this->hasMany('App\Models\HolidayPackageSeoImage', 'holidaypackageseo_id');
    }

    public function ListLayouts()
    {
        return $this->belongsToMany(ListLayout::class, 'holidaypackageseolistlayouts', 'holidaypackageseo_id', 'listlayout_id');
    }

    public function GetListLayoutsId(){
        return $this->ListLayouts()->pluck('listlayout.id')->toArray();
    }

    public function GetListLayoutsName(){
        return $this->ListLayouts()->pluck('listlayout.name');
    }
    
    // public function ContentLayouts()
    // {
    //     return $this->belongsToMany(ContentLayout::class, 'holidaypackageseocontentlayouts', 'holidaypackageseo_id', 'contentlayout_id');
    // }

    // public function GetContentLayoutsId(){
    //     return $this->ContentLayouts()->pluck('contentlayout.id')->toArray();
    // }

    // public function GetContentLayoutsName(){
    //     return $this->ContentLayouts()->pluck('contentlayout.name');
    // }

    public function HolidayPackageSeoContentLayout()
    {
        return $this->hasMany('App\Models\HolidayPackageSeoContentLayout', 'holidaypackageseo_id');
    }

    public function SubCities()
    {
        return $this->belongsToMany(SubCity::class, 'holidaypackageseosubcities', 'holidaypackageseo_id', 'subcity_id');
    }

    public function GetSubCitiesId(){
        return $this->SubCities()->pluck('subcities.id')->toArray();
    }

    public function GetSubCitiesName(){
        return $this->SubCities()->pluck('subcities.name');
    }
}
