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

Route::get('/about', 'AboutController@show');

Route::get('/voyages', 'VoyagesController@index');
Route::get('/voyages/{id}', 'VoyagesController@show');

Route::get('/admin/voyages/{id}', function($id) {return "page admin voyage ".$id ;});


Route::group(['prefix' => 'admin'], function(){
  Route::get('/voyage/create', function() {return view("admin/create");});
  Route::post('/voyage/store', 'AdminVoyageController@store');
  Route::get('/voyage/edit/{id}', 'AdminVoyageController@edit');
  Route::put('/voyage/update/{id}', 'AdminVoyageController@update');
  Route::get('/voyage/delete/{id}', 'AdminVoyageController@destroy');
});
//Route::group(['prefix' =>])

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
