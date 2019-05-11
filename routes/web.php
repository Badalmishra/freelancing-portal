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



Auth::routes(['verify' => true]);
Route::resource('test','testController');
Route::resource('bids','bidsController');


Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::middleware('auth:web')->get('/', function () {
    if(Auth::user()->type=="client"){
        return view('welcome');
    }else{
        return redirect('/home');
    }
})->middleware('verified');
Route::middleware('auth:web')->get('/main', function(){
    return view('reactmainfree');
})->middleware('verified');


Route::get('/pay', 'PaymentController@index');
// route for processing payment

Route::post('paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment

Route::get('status', 'PaymentController@getPaymentStatus');

Route::get('status', 'PaymentController@getPaymentStatus');
Route::middleware('auth:web')->get('profile','profileController@index');
Route::middleware('auth:web')->get('viewer/{id}/','profileController@viewer');
Route::middleware('auth:web')->post('makeReview/','profileController@makeReview');
Route::middleware('auth:web')->get('addportfolio/','profileController@addportfolio');
Route::middleware('auth:web')->post('addpic/','profileController@addpic');
