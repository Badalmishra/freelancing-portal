<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skills extends Model
{
    public function jobSkills()
    {
        return $this->hasMany('App\jobSkills');
    }
}
