<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPackageSeoImage extends Model
{
    use HasFactory;
    protected $table="holidaypackageseoimages";

    public function HolidayPackageSeo()
    {
        return $this->belongsTo('App\Models\HolidayPackageSeo');
    }
}
