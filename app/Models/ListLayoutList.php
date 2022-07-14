<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLayoutList extends Model
{
    use HasFactory;
    protected $table="listlayoutlists";

    public function ListLayout()
    {
        return $this->belongsTo('App\Models\ListLayout');
    }

}
