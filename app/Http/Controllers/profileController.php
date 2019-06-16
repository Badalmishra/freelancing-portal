<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\jobs;
use App\reviews; 
use App\skills; 
use App\userskills;
use Session;

class profileController extends Controller
{
    public function index()
    {   
        if (Auth::user()->type=="freelancer") {
            $user = User::where('id',Auth::user()->id)->with(['reviews.reviewer','userskills.skills'])->get();
            //return $user[0]->userskills;
            $jobs =jobs::whereHas('transactions', function ($query)  {
                $query->where('status','=',  0);
            })->where('assignedTo',Auth::user()->id)->with(['transactions','user','bids'])->get();
            $skills = skills::get();
            return view('profile',['user' => $user[0],'jobs'=>$jobs,'skills'=>$skills]);
            //return count($jobs);
        }else {
            return redirect('/');
        }
    }
    public function viewer(Request $request)
    {   
        $user_id = $request->id;
        $self_id = Auth::check()?Auth::user()->id:0;
        if ($user_id == $self_id) {
            return redirect('/profile');
        }
        $user = User::where('id',$user_id)->with(['reviews.reviewer','userskills.skills'])->get();
        if($user[0]->type=="freelancer"){
            if(isset($user[0])){
                $jobs =jobs::whereHas('transactions', function ($query)  {
                $query->where('status','=',  0);
                })->where('assignedTo',$user_id)->with(['transactions','user','bids'])->get();
                return view('viewer',['user' => $user[0],'jobs'=>$jobs]);
            }
            else{
                return redirect('/');
            }
        }else{
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
    public function addportfolio(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->portfolio= $request->portfolio;
        $user->save();
        return redirect('/profile');
    }
    public function addpic(Request $request)
    {
        if ($request->hasFile('cover_image')) {

            $fileNameWithExt =$request->file('cover_image')->getClientOriginalName();
    
            $filename=pathinfo($fileNameWithExt,  PATHINFO_FILENAME);
    
            $extension = $request->file('cover_image')->getClientOriginalExtension();
    
            $fileNameToStore=Auth::user()->id.'_'.time().'.'.$extension;
    
            $path= $request->file('cover_image')->storeAs('public/user',$fileNameToStore);
    
          }else {
    
            $fileNameToStore ='noimage.jpg';
    
            # code...
    
          }
          $user = User::find(Auth::user()->id);
          if($user->pic){
            Storage::delete('public/user/'.$user->pic);
          }
          $user->pic = $fileNameToStore;
          $user->save();
          return redirect('/profile');

    }
    public function adduserskill(Request $request)
    {
        $user_id = Auth::user()->id;
        $skills_id = $request->skills_id;
        $yoe = $request->yoe;
        if (!isset($yoe)) {
            \Session::put('error', 'Enter all details');
            return redirect('profile/#skills');
            die();
        }
        $userskill = new userskills;
        $userskill->user_id = $user_id;
        $userskill->skills_id = $skills_id;
        $userskill->yoe = $yoe;
        $userskill->save();
        return redirect('profile/#skills');
    }
    public function deleteskills(Request $request)
    {
        $userskill = userskills::find($request->id);
        $userskill->delete();
        return redirect('profile/#skills');
    }
}
