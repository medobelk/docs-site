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

Route::get('/mailable', function () {
    $invoice = App\AnonimRequest::find(1);

    return new App\Mail\EnrollRegistered($invoice);
});

Route::get('/', 'HomeController@index');
Route::post('/enroll', 'HomeController@enroll');


Route::get('/plasma', 'HomeController@questions');

// Route::get('/Pagec/view/name/{name}', 'HomeController@pages');

//questions routes
Route::get('/QA/getlist', 'HomeController@questions');
Route::get('/QA/getlist/question/{id}', 'HomeController@dialogs');
Route::post('/create-question', 'HomeController@createQuestion');
Route::post('/create-answer', 'VoyagerQuestionsController@createAnswer');

//misc info routes
Route::get('/Pagec/view/name/erect-disfunction', 'HomeController@erectDisfunction');
Route::get('/Pagec/view/name/pielonefrit', 'HomeController@pielonefrit');
Route::get('/Pagec/view/name/prostatit', 'HomeController@prostatit');
Route::get('/Pagec/view/name/uretrit', 'HomeController@uretrit');
Route::get('/Pagec/view/name/zistit', 'HomeController@zistit');
Route::get('/Pagec/view/name/sertificates', 'HomeController@setificate');

Route::get('/reviews', 'HomeController@reviews');
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
