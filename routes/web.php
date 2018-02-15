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
// Route::get('/mailable', function (){
// 	return new App\Mail\AnswerPosted;
// });

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
Route::get('/Pagec/view/name/obrezanie', 'HomeController@obrez');
Route::get('/Pagec/view/name/sertificates', 'HomeController@sertificates');
Route::get('/Pagec/view/name/sertificate/{id}', 'HomeController@sertificate');

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
Route::prefix('cabinet')->middleware(['isUser'])->group(function () {
	Route::get('/', 'CabinetController@cabinet');
	Route::get('/question', 'CabinetController@question');
	Route::get('/enroll', 'CabinetController@enroll');
	Route::get('/review', 'CabinetController@review');
	Route::post('/add-question', 'CabinetController@addQuestion');
	Route::post('/add-review', 'CabinetController@addReview');
	Route::post('/add-enroll', 'CabinetController@addEnroll');
	Route::get('/{id}', 'CabinetController@visit');
	Route::patch('/change-phone', 'CabinetController@phone');
	Route::patch('/change-password', 'CabinetController@password');
	Route::patch('/change-email', 'CabinetController@email');
});

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {	

	Route::get('/test', function ()
	{
		return view('admin_cabinet.bulma');
	});

	Route::get('/search', 'CabinetAdminController@search');

	Route::get('/events', 'CabinetAdminController@events');
	Route::post('/events', 'CabinetAdminController@editAddEvent');
	Route::get('/events/{id}', 'CabinetAdminController@events');
	Route::post('/events/{id}', 'CabinetAdminController@editAddEvent');
	Route::delete('/events/{id}', 'CabinetAdminController@deleteEvent');

	Route::get('/calendar', 'CabinetAdminController@calendar');

	Route::get('/', 'CabinetAdminController@createPatient');
	Route::post('/patient', 'CabinetAdminController@storePatient'); 
	Route::get('/patients', 'CabinetAdminController@allPatients');
	Route::get('/patient/{id}', 'CabinetAdminController@showPatient'); //showing Visits too
	Route::get('/patient-edit/{id}', 'CabinetAdminController@editPatient');
	Route::patch('/patient/{id}', 'CabinetAdminController@updatePatient');
	Route::delete('/patient/{id}', 'CabinetAdminController@deletePatient');

	Route::get('/visit/{userId}/{enrollId?}', 'CabinetAdminController@createVisit');
	Route::post('/visit/{userId}', 'CabinetAdminController@storeVisit');
	Route::get('/visit-edit/{id}', 'CabinetAdminController@editVisit');
	Route::patch('/visit/{id}', 'CabinetAdminController@updateVisit');
	Route::delete('/visit/{id}', 'CabinetAdminController@deleteVisit');

	Route::get('/questions', 'CabinetAdminController@questions');
	Route::get('/question/{id}', 'CabinetAdminController@showQuestion');
	Route::post('/question/{id}', 'CabinetAdminController@editQuestion');
	Route::get('/delete-question/{id}', 'CabinetAdminController@deleteQuestion');

	Route::get('/reviews', 'CabinetAdminController@reviews');
	Route::get('/review-edit/{id}', 'CabinetAdminController@editReview');
	Route::post('/review/{id}', 'CabinetAdminController@updateReview');
	Route::put('/review/{id}', 'CabinetAdminController@reviewStatus');
	Route::delete('/review/{id}', 'CabinetAdminController@deleteReview');

	Route::get('/reviews', 'CabinetAdminController@reviews');
	Route::get('/review-edit/{id}', 'CabinetAdminController@editReview');
	Route::post('/review/{id}', 'CabinetAdminController@updateReview');
	Route::put('/review/{id}', 'CabinetAdminController@reviewStatus');
	Route::delete('/review/{id}', 'CabinetAdminController@deleteReview');

	Route::delete('/enroll/{id}', 'CabinetAdminController@deleteEnroll');	
});

Auth::routes();

// Route::get('/{undfPath}', 'HomeController@undefinderRouter');

//Route::get('/home', 'HomeController@index')->name('home');
