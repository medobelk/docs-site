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


Route::get('/plasma', 'HomeController@questions');

//misc info routes
Route::get('/reviews', 'HomeController@reviews');
Route::get('/QA/getlist', 'HomeController@questions');
Route::post('/create-question', 'HomeController@createQuestion');
Route::get('/Pagec/view/name/about', 'HomeController@about');
Route::get('/pricing', 'HomeController@pricing');
Route::get('/Pagec/view/name/hvor', 'HomeController@diseases');
Route::get('/contacts', 'HomeController@contacts');
Route::get('/Pagec/view/name/methods', 'HomeController@treatment');
Route::get('/disease-man', 'HomeController@diseaseMan');
Route::get('/disease-wooman', 'HomeController@diseaseWooman');
Route::get('/disease-kidneys', 'HomeController@diseaseKidneys');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
