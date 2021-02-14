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

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

Route::get('/dashboard', 'dashboard\DashboardController@index');

Route::get('/dashboard/users', 'dashboard\UserController@index')->name('dashboard.users');
Route::get('/dashboard/users/{id}', 'dashboard\UserController@edit')->name('dashboard.users.edit');
Route::post('/dashboard/users/{id}', 'dashboard\UserController@update')->name('dashboard.users.update');
Route::delete('/dashboard/users/{id}', 'dashboard\UserController@destroy')->name('dashboard.users.delete');
