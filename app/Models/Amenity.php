<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Amenity extends Model
{
    use HasFactory;
    protected $table="amenities";

    public function Vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'vehicleamenities');
    }

}
