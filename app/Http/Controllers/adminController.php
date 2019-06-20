<?php

namespace App\Http\Controllers;
use App\User;
use App\admin;
use App\jobs;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(Request $request)
    {
       
     if($request->session()->has('admin'))
        return view('dashboard');
     else
        return view('adminLogin');
    }
    public function authenticate(Request $request)
    {
        $admin = admin::where('username',$request->get('username'))->where('password',$request->get('password'))->get()->count();
        if ($admin == 1) {
            $request->session()->put('admin','true');
            return redirect('/admin');
        }else {
            $request->session()->put('adminMessage','Invalid Credentials');
            return redirect('/admin');
        }
    }
    public function unauthenticate(Request $request)
    {
        
            $request->session()->forget('admin');
            return redirect('/admin');
       
    }
    public function searchuser(Request $request)
    {
        
            $user = User::where('email',$request->get('key'))->with('bids')->get();
            $user = count($user)?$user[0]:null;
            //return $user;
            return view('dashboard')->with(['user' => $user]);
       
    }
    public function adminactive(Request $request,$id)
    {
        $user = User::find($id);
        $jobs =  jobs::where('assignedTo',$id)->where('status',0)->with('transactions','bids','user','jobSkills.skills')->get();
        foreach ($jobs as $job) {
            $date = time();
            $last= strtotime($job->bids[0]->updated_at ."+".$job->bids[0]->time." days" ) ;    
            $sub= $last-$date;
            $job->left=round($sub / (60 * 60 * 24));
            
        }
        $refiend=[];
        // error_log($jobs);
        foreach ($jobs as $job) {
            if (isset($job->transactions)) {
                    // error_log($job->transactions);
                if ($job->transactions->status != 1) {
                    array_push($refiend,$job);
                }
            }else{
                array_push($refiend,$job);
            }
            
        }
        
        //return json_encode($refiend); 
     if($request->session()->has('admin'))
        return view('adminactive',['jobs'=>$refiend]);
     else
        return view('adminLogin',);
    }
    public function deleteadmin(Request $request,$id,$user_id){
        if($request->session()->has('admin')){
            $job=jobs::find($id);
            
            //return $user_id.''.$job->user_id;
                $job->bids()->delete();
                $job->jobSkills()->delete();
                $job->delete();
                $jobs= jobs::where('status',1)->with(['jobSkills.skills','user'])->get();
                $request->session()->put('adminMessage','Job Deleted');
                return redirect('adminactive/'.$user_id);            
        }

        else{
            return view('adminLogin',);
        }
    }
}

