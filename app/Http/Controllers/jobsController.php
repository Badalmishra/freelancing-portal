<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\jobs;
class jobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function index()
    {
       $jobs =  jobs::all();
       // $jobs= $jobs->reverse();
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
        $jobs =  jobs::all();
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
        //
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
            $job->delete();
        $jobs =  jobs::all();
        return json_encode($jobs);            
        }
        else{
            return json_encode("404");
        }
    }
}
