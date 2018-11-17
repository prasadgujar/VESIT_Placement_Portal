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
Route::get('/', function() {
    return view('home');
});
Route::get('/addExperience', 'PlacementController@getPlacementForm');
Route::get('/addCompany', function(){
    return view('record.addCompany');
});
Route::post('/addRecord', 'PlacementController@addRecord')->name('record.addRecord');
Route::post('/addCompany', 'PlacementController@insertCompany')->name('record.addCompany');
Route::get('/experience', 'PlacementController@experience')->name('record.experience');
Route::post('/experience', 'PlacementController@getResultsFromPlacement')->name('record.postExperience');
