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
    public function jobSkills()
    {
        return $this->hasMany('App\jobSkills');
    }
    public function transactions()
    {
        return $this->hasOne('App\transactions');
    }
}
