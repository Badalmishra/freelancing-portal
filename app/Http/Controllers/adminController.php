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
}

