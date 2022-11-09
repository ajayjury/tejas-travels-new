<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripSheet extends Model
{
    use HasFactory;
    protected $table="tripsheet";
    protected $fillable = ["booking_id", "transporter_id", "transporter_driver_id", "name", "email", "phone", "minimum_km", "opening_km", "closing_km", "running_km", "amount_paid_to_driver", "amount_pending_from_driver", "amount_paid_to_customer", "amount_pending_from_customer", "total_amount_collected", "total_earning", "diesel_cost", "inter_state_tax", "toll_parking", "driver_batta", "driver_night_batta", "rent_price", "pending_to_transporter", "pending_from_transporter", "amount_note", "paid_to", "tripsheettype"];

    public function Transporter()
    {
        return $this->hasOne('App\Models\Transporter', 'transporter_id');
    }
    
    public function TransporterDriver()
    {
        return $this->hasOne('App\Models\TransporterDriver', 'transporter_driver_id');
    }

    // protected function amount_note(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_decode($value, true),
    //         set: fn ($value) => json_encode($value),
    //     );
    // }

    
}
