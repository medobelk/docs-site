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

Route::get('/', 'HomeController@index');
Route::post('/enroll', 'HomeController@enroll');


Route::get('/reviews', 'QuestionsController@index');
Route::get('/plasma', 'HomeController@questions');

//misc info routes
Route::get('/about-doctor', 'HomeController@about');
Route::get('/pricing', 'HomeController@pricing');
Route::get('/diseases', 'HomeController@diseases');
Route::get('/contacts', 'HomeController@contacts');
Route::get('/treatment', 'HomeController@treatment');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
