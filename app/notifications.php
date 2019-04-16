<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    public function jobs()
    {
        return $this->belongsTo('App\jobs');
    }
}
