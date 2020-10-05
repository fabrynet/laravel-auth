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

// Guests
// Employee Index
Route::get('/employees', 'GuestController@indexEmployees') -> name('employees.index');

// Employee Show
Route::get('/employees/{id}/show', 'GuestController@showEmployees') -> name('employees.show');

// Logged
// Employee Create
Route::get('/employees/create', 'LoggedController@createEmployees') -> name('employees.create');
Route::post('/employees/store', 'LoggedController@storeEmployees') -> name('employees.store');

// Employee Edit
Route::get('/employees/{id}/edit', 'LoggedController@editEmployees') -> name('employees.edit');
Route::put('/employees/{id}/update', 'LoggedController@updateEmployees') -> name('employees.update');

// Employee Delete
Route::delete('/employees/{id}/destroy', 'LoggedController@destroyEmployees') -> name('employees.destroy');

// Employee tasks
Route::post('/employees/{id}/assigntask', 'LoggedController@assignTaskEmployees') -> name('employees.assigntask');
Route::delete('/employees/{id}/unassigntask', 'LoggedController@unassignTaskEmployees') -> name('employees.unassigntask');
