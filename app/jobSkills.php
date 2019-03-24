<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobSkills extends Model
{
    public function jobs()
    {
        return $this->belongsTo('App\jobs');
    }
    public function skills()
    {
        return $this->belongsTo('App\skills');
    }
}
