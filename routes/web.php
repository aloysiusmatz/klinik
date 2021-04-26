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

Route::resource('dashboard', 'DashboardController');
Route::resource('newtransaction', 'NewTransController');
Route::resource('medrec', 'MedrecController');
Route::resource('allergies', 'AllergiesController');
Route::resource('medicines', 'MedicinesController');
Route::resource('gensettings', 'SettingsController');
Route::resource('usrsettings', 'UsersSettingsController');
Route::resource('pagessettings', 'PagesSettingsController');
Route::resource('reportcheckup', 'ReportCheckupController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'MedrecController@index')->name('home');

Route::get('/medicinessearch', 'MedicinesController@search');
Route::get('/allergiessearch', 'AllergiesController@search');
Route::get('/medrecssearch', 'MedrecController@search');
Route::get('/transmedsearch', 'NewTransController@searchmed')->name('newtransaction.medsearch');
Route::get('/reportcheckupsearch', 'ReportCheckupController@search')->name('reportcheckup.search');
Route::get('/historycheckup', 'HistoryController@search')->name('historycheckup.search');
//Route::get('/print/sickletter', 'PrintController@sickletter')->name('print.sickletter');
Route::get('/printsickletter', 'PrintController@printsickletter');
Route::get('/openhealthletter/{id}', 'PrintController@openhealthletter')->name('print.healthletter');
Route::get('/opensickletter/{id}', 'PrintController@opensickletter');

Route::get('/callstoragelink', function () {
    Artisan::call('storage:link');
});
