<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\jobs; 
class profileController extends Controller
{
    public function index()
    {   
         $user = User::where('id',Auth::user()->id)->with('reviews.reviewer')->get();
         $jobs =jobs::whereHas('transactions', function ($query)  {
            $query->where('status','=',  0);
        })->where('assignedTo',Auth::user()->id)->with(['transactions','user','bids'])->get();
        return view('profile',['user' => $user[0],'jobs'=>$jobs]);
        //return count($jobs);
    }
}
