<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\jobs;
use App\bids;
use App\jobSkills;
use  App\notifications;
use App\transactions;
class jobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function index()
    {
        $jobs =  jobs::where('status',1)->with(['jobSkills.skills','user'])->get();
       // $jobs= $jobs->reverse();
      /// error_log(json_encode($jobs));
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
        $job = new jobs;

        $job->body = $request->body[0];
        $job->description=$request->body[1];
        $job->user_id = Auth::guard('api')->id();
        $job->status = 1;
        $job->assignedTo =null;
        $job->maxMoney=$request->body[2];
        $job->maxDays=$request->body[3];
        $job->linkToReferenceProject=$request->body[4]?$request->body[4]:"";
        $job->save();
        foreach ($request->body[5] as $key => $value) {
            $jobskills = new jobSkills;
            $jobskills->jobs_id=$job->id;
            $jobskills->skills_id=$value;
            $jobskills->save();
        }
        
        //error_log(jobs::with('jobSkills.skills')->get());
        $jobs =  jobs::where('status',1)->with('jobSkills.skills')->get();
        return json_encode($jobs);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs =  Auth::guard('api')->user()->activeJobs()->get();
        return json_encode($jobs);
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
        //$user_id=Auth::guard('api')->id();
        $bid =bids::find($id);
        $bid->status = 0;
        $bid->save();
        $job = jobs::find($bid->jobs_id);
        $job->assignedTo=$bid->user_id;
        $job->status           = 0;
        
        $redundantBids         = $job->bids()->where('id','!=',$bid->id)->delete();
                    $job->save();
        $notification          = new notifications;
        $notification->user_id = $bid->user_id;
        $notification->jobs_id = $bid->jobs_id;
        $notification->status = 0;
        $notification->body    = "Your Bid was Approved Happy Coding!!!";
                    $notification->save();
        $jobs= jobs::where('status',1)->with(['jobSkills.skills','user'])->get();
        return json_encode($jobs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $job=jobs::find($id);
        $user_id=Auth::guard('api')->id();
        //return $user_id.''.$job->user_id;
        if ($job->user_id==$user_id) {

            $job->bids()->delete();
            $job->jobSkills()->delete();
            $job->delete();
            $jobs= jobs::where('status',1)->with(['jobSkills.skills','user'])->get();
            return json_encode($jobs);            
        }
        else{
            return json_encode("404");
        }
    }
    public function transactions(){
        $user_id=Auth::guard('api')->id();
        $transactions = transactions::whereHas('jobs', function ($query) use($user_id) {
            $query->where('assignedTo','=',  $user_id);
        })->get();
        return json_encode($transactions);
    }
}
