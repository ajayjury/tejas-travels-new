<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    public function VehicleModel()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function VehicleTypeModel()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }
    
    public function CityModel()
    {
        return $this->belongsTo('App\Models\City', 'from_city');
    }

    public function BookingPayment()
    {
        return $this->hasMany('App\Models\BookingPayment', 'booking_id');
    }
}