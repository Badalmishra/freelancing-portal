<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    protected $fillable = [
        'status',
    ];
    public function jobs()
    {
        return $this->belongsTo('App\jobs');
    }
}
