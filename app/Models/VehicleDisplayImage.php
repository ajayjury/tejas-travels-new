<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDisplayImage extends Model
{
    use HasFactory;
    protected $table="vehicledisplayimages";

    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
