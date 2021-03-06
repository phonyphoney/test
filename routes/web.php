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

Auth::routes(['register' => false]);
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/register', 'Auth\RegisterController@show')->name('register_show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');

