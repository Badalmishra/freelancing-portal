<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\bids;
use Illuminate\Http\Request;

class bidsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::guard('api')->user();
        
        if($user->type!="client"){
            return redirect('/login'); 
        }
        return $user->bids;
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
        $bid = new bids;

        $bid->user_id   = Auth::guard('api')->id();
        $bid->jobs_id    = $request->body[2];
        $bid->price     = $request->body[3];
        $bid->time      = $request->body[4];
        $bid->proposal  = $request->body[0];
        $bid->status    = 1;

        $bid->save();
        $bids =  bids::with('user')->get();
        return json_encode($bids);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bids =  bids::with('user')->get();
        return json_encode($bids);
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
        //
    }
}
