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

Route::view('/', 'home');
Route::view('about', 'about');
Route::view('contact', 'contact');

Route::get('customers', 'CustomersController@list')->middleware('auth');
Route::post('customers', 'CustomersController@store')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
