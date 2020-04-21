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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Clock punch.
Route::get('clock', 'TimeclockController@clock')->name('clock.show');
Route::post('clock', 'TimeclockController@punch')->name('clock.punch');

// Reports.
Route::get('reporting/timesheet', 'ReportingController@timesheet')->name('reporting.timesheet');
