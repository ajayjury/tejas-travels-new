<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypeSeoImage extends Model
{
    use HasFactory;
    protected $table="vehicletypesseoimages";

    public function VehicleTypeSeo()
    {
        return $this->belongsTo('App\Models\VehicleTypeSeo');
    }
}
