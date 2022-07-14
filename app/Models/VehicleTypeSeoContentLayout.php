<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypeSeoContentLayout extends Model
{
    use HasFactory;
    protected $table="vehicletypesseocontentlayouts";

    public function VehicleTypesSeo()
    {
        return $this->belongsTo('App\Models\VehicleTypesSeo');
    }
}
