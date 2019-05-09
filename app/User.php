<?php

namespace App;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','paypal','resume','portfolio','facebook','twitter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    public function jobs()
    {
        return $this->hasMany('App\jobs');
    }
    public function reviews()
    {
        return $this->hasMany('App\reviews');
    }
    public function activeJobs()
    {
        if (Auth::user()->type=='client') {
            $jobs =$this->hasMany('App\jobs')->with('transactions')->where('status',0);    # code...
        }else{
            $jobs =$this->hasMany('App\jobs','assignedTo')->with('transactions')->where('status',0);
        }
        return $jobs;
    }
    
    public function bids()
    {
        return $this->hasMany('App\bids');
    }
    public function notifications()
    {
        return $this->hasMany('App\notifications');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
