<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransporterDriver extends Model
{
    use HasFactory;
    protected $table="transporter_drivers";

    public function Transporter()
    {
        return $this->belongsTo('App\Models\Transporter');
    }
}
