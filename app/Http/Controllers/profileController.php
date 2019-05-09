<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class profileController extends Controller
{
    public function index()
    {   
         $user = User::where('id',Auth::user()->id)->with('reviews')->get();
        return view('profile',['user' => $user[0]]);

    }
}
