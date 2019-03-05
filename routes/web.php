<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::resource('test','testController');
Route::resource('bids','bidsController');

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth:web')->get('/', function () {
    if(Auth::user()->type=="client"){
        return view('welcome');
    }else{
        return redirect('/home');
    }
});