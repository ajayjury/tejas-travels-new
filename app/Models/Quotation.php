<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $user = User::where('phone', $model->phone)->orWhere('email', $model->phone)->where('status', 1)->where('userType', 1)->orWhere('userType', 2)->get();
            if(!count($user)>1){
                $user = new User;
                $user->name = $model->name;
                $user->email = $model->email;
                $user->phone = $model->phone;
                $user->userType = 2;
                $user->otp = rand(1000,9999);
                $user->save();
            }
        });
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City', 'from_city');
    }
    
    public function Vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function VehicleType()
    {
        return $this->belongsTo('App\Models\VehicleType', 'vehicletype_id');
    }

    public function OutStation()
    {
        return $this->belongsTo('App\Models\OutStation', 'vehicle_id');
    }
    
    public function LocalRide()
    {
        return $this->belongsTo('App\Models\LocalRide', 'vehicle_id');
    }
    
    public function AirportRide()
    {
        return $this->belongsTo('App\Models\AirportRide', 'vehicle_id');
    }
}
