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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create', 'AdController@create')->name('create')->middleware('auth');
Route::post('/create', 'AdController@store')->name('store')->middleware('auth');
Route::get('/allAds','AdController@index')->name('all-ads');
Route::get('/singleAd/{id}','AdController@show')->name('single-ad');

Route::delete('/remove/{id}', 'AdController@destroy')->name('destroy')->middleware('auth');
Route::get('/edit/{id}', 'AdController@edit')->name('edit')->middleware('auth');
Route::put('/update-ad/{id}','AdController@update')->name('update-ad')->middleware('auth');
Route::get('/categoryAds/{category_id}','CategoryController@show')->name('category-ads');
Route::get('/user/{id}','UserController@show')->name('user-details');