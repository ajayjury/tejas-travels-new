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

    public function Airport()
    {
        return $this->belongsTo('App\Models\Airport', 'airport_id');
    }
    
    public function OutStation()
    {
        return $this->belongsTo('App\Models\OutStation', empty($this->main_ride_id) ? 'vehicle_id' : 'main_ride_id');
    }
    
    public function LocalRide()
    {
        return $this->belongsTo('App\Models\LocalRide', empty($this->main_ride_id) ? 'vehicle_id' : 'main_ride_id');
    }
    
    public function AirportRide()
    {
        return $this->belongsTo('App\Models\AirportRide', empty($this->main_ride_id) ? 'vehicle_id' : 'main_ride_id');
    }

    public function BookingPayment()
    {
        return $this->hasMany('App\Models\BookingPayment', 'booking_id');
    }
}
