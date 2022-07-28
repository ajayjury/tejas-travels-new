<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneOTP extends Model
{
    use HasFactory;
    protected $table = 'phoneotps';


    protected $fillable = [
        'phone',
    ];

}
