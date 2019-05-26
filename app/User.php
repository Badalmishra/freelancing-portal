<?php

namespace App;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable implements MustVerifyEmail
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
    public function userskills()
    {
        return $this->hasMany('App\userskills');
    }


    public function activeJobs()
    {
        if (Auth::user()->type=='client') {
            $jobs =$this->hasMany('App\jobs')->with(['transactions','freelancer','user','jobSkills.skills'])->where('status',0);    # code...
        }else{
            $jobs =$this->hasMany('App\jobs','assignedTo')->with('transactions','bids','user','jobSkills.skills')->where('status',0);
        }
        return $jobs;
    }
    public function completedJobs()
    {
        if (Auth::user()->type=='client') {
            $jobs =$this->hasMany('App\jobs')->with(['transactions','freelancer','user','jobSkills.skills'])->where('status',2);    # code...
        }else{
            $jobs =$this->hasMany('App\jobs','assignedTo')->with('transactions','bids','user','jobSkills.skills')->where('status',2);
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
