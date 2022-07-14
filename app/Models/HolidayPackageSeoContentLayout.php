<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPackageSeoContentLayout extends Model
{
    use HasFactory;
    protected $table="holidaypackageseocontentlayouts";

    public function HolidayPackageSeo()
    {
        return $this->belongsTo('App\Models\HolidayPackageSeo');
    }
}
