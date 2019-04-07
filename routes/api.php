<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('logapi','thatauthapicontroller@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->resource('bids','bidsController');

Route::middleware('auth:api')->resource('jobs', 'jobsController');

Route::middleware('auth:api')->resource('skills', 'skillsController');

Route::middleware('auth:api')->resource('notifications', 'notificationsController');

//Route::resource('jobs', 'jobsController');