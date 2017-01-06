<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::get('/laoka', 'HomeController@measure');
Route::post('/get_menu', 'HomeController@get_menu');
Route::post('/get_room', 'HomeController@get_room');
Route::post('/get_img', 'HomeController@get_img');
Route::post('/get_customer', 'HomeController@get_customer');

Route::post('/add_customer_do', 'HomeController@add_customer_do');
Route::post('/del_customer', 'HomeController@del_customer');
Route::post('/upload_header', 'HomeController@upload_header');
Route::get('captcha/mews', 'HomeController@mews');
Route::post('captcha/check', 'HomeController@check');
Route::post('get_city', 'HomeController@get_city');