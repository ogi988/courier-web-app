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

Route::get('/onama', function () {
    return view('onama');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/track', 'HomeController@track')->name('track');

/*Route::get('/admin', function (){
  return "admin";
})->middleware(['auth','auth.admin']);
*/



Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::get('/users','UserController@index')->name('users.index');
    Route::post('/users','UserController@store')->name('users.store');
    Route::get('/users/create','UserController@create')->name('users.create');
    Route::delete('/users/{user}','UserController@destroy')->name('users.destroy');
    Route::put('/users/{user}','UserController@update')->name('users.update');
    Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');
    Route::get('/vehicles','VehicleController@index')->name('vehicles.index');
    Route::get('/vehicles/create','VehicleController@create')->name('vehicles.create');
    Route::post('/vehicles','VehicleController@store')->name('vehicles.store');
    Route::delete('/vehicles/{vehicle}','VehicleController@destroy')->name('vehicles.destroy');
    Route::get('/postavke','PostavkeController@index')->name('postavke.index');
    Route::put('/postavke/{postavke}','PostavkeController@update')->name('postavke.update');
    Route::get('/shipments','ShipmentController@index')->name('shipments.index');
    Route::get('/shipments/{shipment}/edit','ShipmentController@edit')->name('shipments.edit');
    Route::put('/shipments/{shipment}','ShipmentController@update')->name('shipments.update');

});


Route::namespace('Worker')->prefix('worker')->middleware(['auth','auth.worker'])->name('worker.')->group(function (){
    Route::get('/shipments','ShipmentController@index')->name('shipments.index');
    Route::post('/shipments','ShipmentController@store')->name('shipments.store');
    Route::get('/shipments/create','ShipmentController@create')->name('shipments.create');
    Route::delete('/shipments/{shipment}','ShipmentController@destroy')->name('shipments.destroy');
    Route::put('/shipments/{shipment}','ShipmentController@update')->name('shipments.update');
    Route::get('/shipments/{shipment}/edit','ShipmentController@edit')->name('shipments.edit');
    Route::post('/shipments/zaduzi', 'ShipmentController@zaduzi')->name('shipments.zaduzi');
    Route::post('/shipments/magacin', 'ShipmentController@magacin')->name('shipments.magacin');
    Route::post('/shipments/krajnje', 'ShipmentController@krajnje')->name('shipments.krajnje');
    Route::get('/barcode', 'ShipmentController@barcode')->name('barcode');
    Route::post('/ajax', 'ShipmentController@ajaxRequestPost')->name('ajax');
    Route::get('/vehicles','VehicleController@index')->name('vehicles.index');
    Route::put('/vehicles/{vehicle}','VehicleController@update')->name('vehicles.update');
    Route::post('/vehicles/razduzi', 'VehicleController@razduzi')->name('vehicles.razduzi');
    Route::get('/map', 'ShipmentController@map')->name('map');


});

Route::namespace('User')->prefix('user')->middleware(['auth','auth.user'])->name('user.')->group(function (){
    Route::get('/shipments','ShipmentController@index')->name('shipments.index');
    Route::get('/shipments/create ','ShipmentController@create')->name('shipments.create');
    Route::post('/shipments','ShipmentController@store')->name('shipments.store');


});
