<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class thatauthapicontroller extends Controller
{
    function index()
    {
        $credentials=[
            'email'=>'bb@b.com',
            'password' => '123456'
        ];
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $newUser=User::find(Auth::id());
            $newUser->api_token=Hash::make(str_random(60));;
            $newUser->save();
            return $newUser->api_token;
        }
    }
}
