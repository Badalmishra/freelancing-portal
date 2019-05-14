<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userskills extends Model
{
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    public function skills()
    {
        return $this->belongsTo('App\skills');
    }
}
