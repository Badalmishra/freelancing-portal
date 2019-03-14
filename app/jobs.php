<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function bids()
    {
        return $this->hasMany('App\bids');
    }
}
