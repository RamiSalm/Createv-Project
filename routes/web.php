<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('setlocale/{locale}',function($lang){
    Session::put('locale',$lang);
    return redirect()->back();   
});

Route::group(['middleware'=>'language'],function ()
{
    Route::get('/', 'web\NewsController@index');

    //Staff Route
    Route::get('allStaff','web\StaffController@index');
    Route::get('createStaff','web\StaffController@create');
    Route::post('storeStaff','web\StaffController@store');
    Route::get('deleteStaff/{id}','web\StaffController@destroy');
    Route::get('editStaff/{id}','web\StaffController@edit');
    Route::post('updateStaff/{id}','web\StaffController@update');

    //News Route
    Route::get('allNews','web\NewsController@index');
    Route::get('createNews','web\NewsController@create');
    Route::post('storeNews','web\NewsController@store');
    Route::get('deleteNews/{id}','web\NewsController@destroy');
    Route::get('editNews/{id}','web\NewsController@edit');
    Route::post('updateNews/{id}','web\NewsController@update');

    //Pation Route
    Route::get('allPation','web\PationController@index');
    Route::get('createPation','web\PationController@create');
    Route::post('storePation','web\PationController@store');
    Route::get('deletePation/{id}','web\PationController@destroy');
    Route::get('editPation/{id}','web\PationController@edit');
    Route::post('updatePation/{id}','web\PationController@update');
});