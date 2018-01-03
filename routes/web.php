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
    $user = [
		"_token" => "syBvMw9SOA8lzJPLmH1uqpVPLuO0zIfn6ipFtjs7",
		"name" => "medobelk medobelkmedobelkmedobelk",
		"password" => "6A5lJcato",
		"email" => "evgeniy@studnote.com",
		"phone" => "+380962422008",
		"visit_date" => "12/29/2017 7:17 PM",
		"control_visit" => "01/04/2018 7:16 PM",
	];

    return new App\Mail\UserRegistered($user);
});

Route::get('/', 'HomeController@index');
Route::post('/enroll', 'HomeController@enroll');

Route::get('/success-enroll', 'HomeController@successEnroll');

// Route::get('/plasma', 'HomeController@questions');

//Custom Voyager
Route::post('/admin-cus/enroll-accept/{id}', 'VoyagerActionsController@visit');
Route::post('/admin-cus/review-accept/{id}', 'VoyagerActionsController@review');
Route::post('/admin-cus/review-hide/{id}', 'VoyagerActionsController@reviewHide');
Route::post('/admin-cus/analyze-edit-add/{analyze}', 'VoyagerActionsController@analyze');
Route::post('/admin-cus/analyze-delete/{analyze}', 'VoyagerActionsController@analyzeDelete');

//questions routes
Route::get('/QA/getlist', 'HomeController@questions');
Route::get('/QA/getlist/question/{id}', 'HomeController@dialogs');
Route::post('/create-question', 'HomeController@createQuestion');
Route::post('/create-answer', 'VoyagerQuestionsController@createAnswer');
Route::get('/success-question', 'HomeController@successQuestion');

//misc info routes
Route::get('/Pagec/view/name/erect-disfunction', 'HomeController@erectDisfunction');
Route::get('/Pagec/view/name/pielonefrit', 'HomeController@pielonefrit');
Route::get('/Pagec/view/name/prostatit', 'HomeController@prostatit');
Route::get('/Pagec/view/name/uretrit', 'HomeController@uretrit');
Route::get('/Pagec/view/name/zistit', 'HomeController@zistit');
Route::get('/Pagec/view/name/obrez', 'HomeController@obrez');
Route::get('/Pagec/view/name/sertificates', 'HomeController@setificates');
Route::get('/Pagec/view/name/sertificate', 'HomeController@setificate');

Route::get('/reviews', 'HomeController@reviews');
Route::get('/Pagec/view/name/about', 'HomeController@about');
Route::get('/pricing', 'HomeController@pricing');
Route::get('/Pagec/view/name/hvor', 'HomeController@diseases');
Route::get('/contacts', 'HomeController@contacts');
Route::get('/Pagec/view/name/methods', 'HomeController@treatment');
Route::get('/disease-man', 'HomeController@diseaseMan');
Route::get('/disease-wooman', 'HomeController@diseaseWooman');
Route::get('/disease-kidneys', 'HomeController@diseaseKidneys');

//users cabinet
Route::get('/cabinet', 'PatientsController@cabinet');
Route::get('/cabinet-question', 'PatientsController@question');
Route::get('/cabinet-enroll', 'PatientsController@enroll');
Route::get('/cabinet-review', 'PatientsController@review');
Route::post('/cabinet-add-question', 'PatientsController@addQuestion');
Route::post('/cabinet-add-review', 'PatientsController@addReview');
Route::post('/cabinet-add-enroll', 'PatientsController@addEnroll');
Route::get('/cabinet/{id}', 'PatientsController@visit');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/{undfPath}', 'HomeController@undefinderRouter');

//Route::get('/home', 'HomeController@index')->name('home');
