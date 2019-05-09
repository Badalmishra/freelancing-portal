<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    public function reviewer()
    {
        return $this->belongsTo('App\user','by');
    }
}
