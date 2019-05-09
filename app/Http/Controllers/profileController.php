<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\jobs;
use App\reviews; 
use Session;

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
    public function viewer(Request $request)
    {   
        $user_id = $request->id;
        if ($user_id == Auth::user()->id) {
            return redirect('/profile');
        }
        $user = User::where('id',$user_id)->with('reviews.reviewer')->get();
        if(isset($user[0])){
            $jobs =jobs::whereHas('transactions', function ($query)  {
            $query->where('status','=',  0);
            })->where('assignedTo',$user_id)->with(['transactions','user','bids'])->get();
            return view('viewer',['user' => $user[0],'jobs'=>$jobs]);
        }
        else{
            return redirect('/');
        }
    }
    public function makeReview(Request $request)
    {   
        $myid = Auth::user()->id;
        if ($request->id == $myid) {
            return redirect('/profile');
        }
        $count = count(
                reviews::where('user_id',$request->id)
                        ->where('by',$myid)
                        ->get()
                    );
        if($count==0) {   
            $review = new reviews;
            $review->user_id = $request->id;
            $review->body = $request->review;
            $review->stars = $request->stars;
            $review->by = $myid;
            $review->save();
            \Session::put('success', 'Review made');
            return redirect('viewer/'.$request->id.'/#form');
        }else {
            \Session::put('error', 'You already have a review on this freelancer');
            return redirect('viewer/'.$request->id.'/#form');
        }
    }
}
