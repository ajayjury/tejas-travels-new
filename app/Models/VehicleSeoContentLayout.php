<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSeoContentLayout extends Model
{
    use HasFactory;
    protected $table="vehicleseocontentlayouts";

    public function VehicleSeo()
    {
        return $this->belongsTo('App\Models\VehicleSeo');
    }
}
