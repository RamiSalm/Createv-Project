<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    //User Route
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('register', 'Api\AuthController@register');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('user', 'Api\AuthController@user');

    //Staff Route
    Route::get('allStaff', 'Api\StaffController@index');
    Route::post('newStaff', 'Api\StaffController@store');
    Route::get('showStaff/{id}', 'Api\StaffController@show');
    Route::post('updateStaff/{id}', 'Api\StaffController@update');
    Route::get('deleteStaff/{id}', 'Api\StaffController@destroy');

    //News Route
    Route::get('allNews', 'Api\NewsController@index');
    Route::post('newNews', 'Api\NewsController@store');
    Route::get('showNews/{id}', 'Api\NewsController@show');
    Route::post('updateNews/{id}', 'Api\NewsController@update');
    Route::get('deleteNews/{id}', 'Api\NewsController@destroy');
    
    //Pation Route
    Route::get('allPation', 'Api\PationController@index');
    Route::post('newPation', 'Api\PationController@store');
    Route::get('showPation/{id}', 'Api\PationController@show');
    Route::post('updatePation/{id}', 'Api\PationController@update');
    Route::get('deletePation/{id}', 'Api\PationController@destroy');

});
