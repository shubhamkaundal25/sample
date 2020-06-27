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



Auth::routes();



Route::any('register','Api\UserController@Register');


Route::any('verify/otp','Api\UserController@verifyOtp');

Route::post('login','AuthController@login');

Route::post('resend/otp','Api\UserController@ResendOtp');




    

    // Route::post('signup', 'AuthController@signup');
  
    Route::group(['middleware' => 'auth:api'], function(){
Route::get('details', 'Api\UserController@details');
});
