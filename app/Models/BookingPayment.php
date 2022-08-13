<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class BookingPayment extends Model
{
    use HasFactory;
    protected $table="bookingpayments";

    public function Booking()
    {
        return $this->belongsTo('App\Models\Booking', 'booking_id');
    }

    public function encryptedId(){
        return Crypt::encryptString($this->id);
    }
}
