<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    use HasFactory;
    protected $table="bookingpayments";

    public function Booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id');
    }
}
