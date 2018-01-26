<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Visit;
use App\AnonimRequest;
use App\Question;
use App\Review;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class CabinetAdminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createPatient()
    {
        return view('admin_cabinet.create-patient');
    }

    public function storePatient(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => [
                'required',
                'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/',
                'unique:users,phone'
            ],
            'birth_date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }
        
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->birth_date = $request->birth_date;
        $user->save();

        $to = $user->email;
        $subject = 'Регистрация';
        $message = "
            <html>
                <head>
                    <title>Регистрация</title>
                </head>
                <body>
                    <p>Здравствуйте {$user->name}. Вы были автоматически зарегистрированы на сайте <a href='http://docurolog.od.ua/'>docurolog.od.ua</p>
                    <p>Можете ознакомиться со своей историей болезни.</p>
                    <h4>Данные:</h4>
                    <p>Логин - {$user->email}</p>
                    <p>Пароль - {$request->password}</p>
                </body>
            </html>
        ";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";        
        // mail($to, $subject, $message, $headers);

        return redirect("admin/visit/$user->id");
    }

    public function allPatients()
    {
        $users = User::where('role_id', 2)->get();
        return view('admin_cabinet.all-patients')->with('users', $users);
    }

    public function showPatient($id)
    {	
    	$user = User::where('id', $id)->first();
        $visits = Visit::where('user_id', $id)->get();
    	return view('admin_cabinet.patient-visits')->with(['user' => $user, 'visits' => $visits]);
    }

    public function editPatient($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin_cabinet.edit-patient')->with('user', $user);
    }

    public function updatePatient(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:15',
            'email' => 'required|email',
            'phone' => [
                'required',
                'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/'
            ],
            'birth_date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $user = User::where('id', $id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if( strlen( $request->password ) ){
            $user->password = Hash::make($request->password);
        }
        $user->birth_date = $request->birth_date;
        $user->save();

        return redirect("admin/patient/$user->id");
    }

    public function deletePatient($id)
    {
        User::where('id', $id)->first()->delete();
        return back();
    }

    public function createVisit($userId)
    {   
        $user = User::where('id', $userId)->first();
        return view('admin_cabinet.visit-create')->with('user', $user);
    }

    public function storeVisit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'treatment' => 'required',
            'complaints' => 'required',
            'visit_date' => 'required',
            'userId' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $visit = Visit::where('user_id', $request->userId)->first();
        $visit->complaints = $request->complaints;
        $visit->treatment = $request->treatment;
        $visit->diagnosis = $request->diagnosis;
        $visit->recomendations = $request->recomendations;
        $visit->visit_date = $request->visit_date;
        $visit->save();

        return redirect("admin/patient/$visit->user_id");
    }

    public function editVisit(Request $request, $id)
    {
        $visit = Visit::where('id', $id)->with('user')->first();
        return view('admin_cabinet.visit-edit')->with('visit', $visit);
    }

    public function updateVisit(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'treatment' => 'required',
            'complaints' => 'required',
            'visit_date' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $visit = Visit::where('id', $id)->first();
        $visit->complaints = $request->complaints;
        $visit->treatment = $request->treatment;
        $visit->diagnosis = $request->diagnosis;
        $visit->recomendations = $request->recomendations;
        $visit->visit_date = $request->visit_date;
        $visit->save();

        return redirect("admin/patient/$visit->user_id");
    }

    public function deleteVisit($id)
    {
        Visit::where('id', $id)->first()->delete();
        return back();
    }

    public function questions()
    {   
        $questions = Question::orderBy('answer', 'asc')->get();
        $users = User::where('role_id', 2)->get();
        return view('admin_cabinet.questions')->with(['users' => $users, 'questions' => $questions]);
    }

    public function showQuestion($id)
    {
        $question = Question::where('id', $id)->first();
        $users = User::where('role_id', 2)->get();
        return view('admin_cabinet.answer-question')->with(['users' => $users, 'question' => $question]);
    }

    public function editQuestion(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'complaints' => 'required|min:30',
            'answer' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $question = Question::where('id', $id)->first();
        $question->complaints = $request->complaints;
        $question->answer = $request->answer;
        $question->save();

        return redirect( action('CabinetAdminController@questions') );
    }

    public function deleteQuestion($id)
    {
        Question::where('id', $id)->delete();
        return redirect()->back();
    }

    public function reviews()
    {
        $reviews = Review::all();
        $users = User::where('role_id', 2)->get();
        return view('admin_cabinet.reviews')->with(['users' => $users, 'reviews' => $reviews]);
    }

    public function editReview($id)
    {
        $review = Review::where('id', $id)->first();
        return view('admin_cabinet.edit-review')->with('review', $review);
    }

    public function updateReview(Request $request, $id)
    {
        $review = Review::where('id', $id)->first();
        $review->body = $request->body;
        $review->save();
        return redirect('admin/reviews');
    }

    public function reviewStatus($id)
    {
        $review = Review::where('id', $id)->first();

        $review->status = $review->status === 'APPROVED' ? 'PENDING' : 'APPROVED';
        $review->save();

        return redirect()->back();
    }

    public function deleteReview($id)
    {
        Review::where('id', $id)->delete();
        return redirect()->back();
    }

    public function events($id = null)
    {	
    	$events = Event::all();
    	$event = collect(['id' => 0, 'name' => '', 'description' => '', 'body' => '', 'event_date_start' => '', 'event_date_end' => '']);
    	if( $id !== null ){
    		$event = Event::where('id', $id)->first()->toArray();
    	}
    	return view('admin_cabinet.events')->with([ 'events' => $events, 'event' => $event ]);
    }

    public function editAddEvent(Request $request, $id = null)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:10',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'body' => 'required|min:20'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        
        if( $id !== null ){
        	$event = Event::where('id', $id)->first();
        }else{
        	$event = new Event();
        }

        $event->name = $request->name;
        $event->event_date_start = $request->event_date_start;
        $event->event_date_end = $request->event_date_end;
        $event->body = $request->body;
        $event->description = $request->description;
        $event->save();

        return redirect("admin/events/$event->id");
    }

    public function search(Request $request)
    {   
        if( strlen($request->searchString) > 0){
            $result = User::where('name', 'like', "%$request->searchString%")->get(['name', 'birth_date', 'id']);
            return response()->json($result);
        }else{
            $result = User::where('role_id', 2)->get(['name', 'birth_date', 'id']);
            return response()->json($result);
        }
        return response()->json('ebat');
    }

    public function calendar()
    {   
        $events = Event::all();
        $visits = Visit::all();
        $calendarData = array_merge($events, $visits);

    	return view('admin_cabinet.calendar')->with('calendarData', $calendarData);
    }
}
