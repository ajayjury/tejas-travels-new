<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    use HasFactory;
    protected $table="packagetypes";

    public function LocalRide()
    {
        return $this->hasMany('App\Models\LocalRide');
    }
}
