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


Auth::routes();



// Guest/PageController

Route::get('/', 'Guest\PageController@index')->name('home');
Route::get('/search', 'Guest\PageController@search')->name('search');

// Dashboard

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {


    Route::get('/', 'DashboardController@index');
    Route::resource('doctors', 'DoctorController');
    Route::resource('services', 'ServiceController');
    Route::resource('clinics', 'ClinicController');
    Route::resource('analytics', 'AnalyticController');



});