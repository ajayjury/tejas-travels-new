<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table="countries";

    public function State()
    {
        return $this->hasMany('App\Models\State');
    }

    public function City()
    {
        return $this->hasMany('App\Models\City');
    }

    public function SubCity()
    {
        return $this->hasMany('App\Models\SubCity');
    }

    public function Airport()
    {
        return $this->hasMany('App\Models\Airport');
    }

    public function Festival()
    {
        return $this->hasMany('App\Models\Festival');
    }
}
