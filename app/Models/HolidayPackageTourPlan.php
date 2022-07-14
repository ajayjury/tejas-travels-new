<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPackageTourPlan extends Model
{
    use HasFactory;
    protected $table="holidaypackagetourplans";

    public function HolidayPackage()
    {
        return $this->belongsTo('App\Models\HolidayPackage', 'holidaypackage_id');
    }
}
