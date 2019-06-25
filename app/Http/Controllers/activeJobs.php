<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\jobs;

class activeJobs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $jobs =  Auth::guard('api')->user()->activeJobs()->get();
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
        
        return json_encode($refiend);
    }
    public function completed()
    {
        $jobs =  Auth::guard('api')->user()->completedJobs()->get();
       
        

     
        
        return json_encode($jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job= jobs::find($id);
        $job->final_link =$request->somedata[1];
        $job->save();
        $jobs =  Auth::guard('api')->user()->activeJobs()->get();
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
        
        return json_encode($refiend);
    }
    public function report(Request $request,$id)
    {
        $job= jobs::find($id);
        $job->report =1;
        $job->save();
        $jobs =  Auth::guard('api')->user()->activeJobs()->get();
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
        
        return json_encode($refiend);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
