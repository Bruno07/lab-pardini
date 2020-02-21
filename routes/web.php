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

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'PatientController@create');
    Route::get('/patients', 'PatientController@index');
    Route::get('/patients/{id}', 'PatientController@show');
    Route::post('/patients/', 'PatientController@store');
    Route::put('/patients/{id}', 'PatientController@update');
    Route::get('/patients/edit/{id}', 'PatientController@edit');
    Route::get('/patients/{id}/contacts', 'PatientController@showContacts');
    Route::get('/patients/{id}/addresses', 'PatientController@showAddresses');
});
