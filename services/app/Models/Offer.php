<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function sector()
    {
        return $this->belongsTo('App\Models\Sector');
    }
}
