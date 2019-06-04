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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/track', 'HomeController@track')->name('track');

/*Route::get('/admin', function (){
  return "admin";
})->middleware(['auth','auth.admin']);
*/



Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users','UserController');
    Route::resource('/vehicles','VehicleController');
    Route::resource('/postavke','PostavkeController');

});


Route::namespace('Worker')->prefix('worker')->middleware(['auth','auth.worker'])->name('worker.')->group(function (){
    Route::resource('/shipments', 'ShipmentController');
    Route::post('/shipments/zaduzi', 'ShipmentController@zaduzi')->name('shipments.zaduzi');
    Route::post('/shipments/magacin', 'ShipmentController@magacin')->name('shipments.magacin');
    Route::post('/shipments/krajnje', 'ShipmentController@krajnje')->name('shipments.krajnje');
    Route::get('/barcode', 'ShipmentController@barcode')->name('barcode');
    Route::post('/ajax', 'ShipmentController@ajaxRequestPost')->name('ajax');
    Route::resource('/vehicles','VehicleController');
    Route::post('/vehicles/razduzi', 'VehicleController@razduzi')->name('vehicles.razduzi');
    Route::get('/map', 'ShipmentController@map')->name('map');


});

Route::namespace('User')->prefix('user')->middleware(['auth','auth.user'])->name('user.')->group(function (){
    Route::resource('/shipments','ShipmentController');


});
