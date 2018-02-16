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
use App\Analyze;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

        Mail::to($user->email)->send(new \App\Mail\UserRegistered($user->toArray(), $request->password));

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
        $visits = Visit::where('user_id', $id)->orderBy('visit_date', 'desc')->with('analyzes')->get();
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

    public function createVisit($userId, $enrollId = null)
    {   
        $user = User::where('id', $userId)->first();
        $enroll = $enrollId === null ?: AnonimRequest::find($enrollId);

        return view('admin_cabinet.visit-create')->with(['user' => $user, 'enroll' => $enroll]);
    }

    public function storeVisit(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'treatment' => 'required',
            'complaints' => 'required',
            'visit_date' => 'required|unique:visits,visit_date',
            'userId' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        if( $request->enrollId !== null ){
            AnonimRequest::find($request->enrollId)->delete();
        }
        
        $visit = new Visit();
        $visit->user_id = $request->userId;
        $visit->complaints = $request->complaints;
        $visit->treatment = $request->treatment;
        $visit->diagnosis = $request->diagnosis;
        $visit->recomendations = $request->recomendations;
        $visit->visit_date = $request->visit_date;
        $visit->save();

        if($request->analyzes !== null){
            foreach ($request->analyzes as $analyzeFile) {
                $analyzeFile->store(
                        'public/analyzes/'
                );

                $analyze = new Analyze();
                $analyze->user_id = $request->userId;
                $analyze->visit_id = $visit->id;
                $analyze->name = $analyzeFile->getClientOriginalName();
                $analyze->path = '/analyzes/'.$analyzeFile->hashName();
                $analyze->save();
            }
        }

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

        $visitAnalyzes = Analyze::where('visit_id', $visit->id)->pluck('id');

        foreach ($visitAnalyzes as $key => $analyzeId) {
            if( !$request->has('analyze-exist-'.$analyzeId) ){
                $analyzeToDelete = Analyze::where('id', $analyzeId)->first();
                Storage::disk('local')->delete('public'.$analyzeToDelete->path);
                $analyzeToDelete->delete();
            }elseif( $request->input('analyze-exist-'.$analyzeId) === 'edit' ){
                $analyzeToUpdate = Analyze::where('id', $analyzeId)->first();
                Storage::disk('local')->delete('public'.$analyzeToUpdate->path);
                $newAnalyzeFile = $request->file('analyze-exist-'.$analyzeId);
                $newAnalyzeFile->store(
                        'public/analyzes/'
                );
                $analyzeToUpdate->name = $newAnalyzeFile->getClientOriginalName();
                $analyzeToUpdate->path = '/analyzes/'.$newAnalyzeFile->hashName();
                $analyzeToUpdate->save();
            }
        }

        if($request->analyzes !== null){
            foreach ($request->analyzes as $analyzeFile) {
                $analyzeFile->store(
                        'public/analyzes/'
                );

                $analyze = new Analyze();
                $analyze->user_id = $request->userId;
                $analyze->visit_id = $visit->id;
                $analyze->name = $analyzeFile->getClientOriginalName();
                $analyze->path = '/analyzes/'.$analyzeFile->hashName();
                $analyze->save();
            }
        }

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

        if( (boolean)$question->subscribe ){
            Mail::to($question->email)->send( new \App\Mail\AnswerPosted( $question ));
        }

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
    	$events = Event::where('type', 'published')->get();
    	$event = collect(['id' => 0, 'name' => '', 'description' => '', 'type' => 'hidden', 'body' => '', 'event_date_start' => '', 'event_date_end' => '']);
    	
        if( $id !== null ){
    		$event = Event::where('id', $id)->first()->toArray();
    	}

    	return view('admin_cabinet.events')->with([ 'events' => $events, 'event' => $event ]);
    }

    public function editAddEvent(Request $request, $id = null)
    {
    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:10',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            // 'description' => 'required',
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
        $event->event_date_start = $request->start_date;
        $event->event_date_end = $request->end_date;
        $event->body = $request->body;
        $event->description = $request->description;
        $event->type = $request->type;
        $event->save();

        return redirect("admin/events/$event->id");
    }

    public function deleteEvent($id)
    {
        Event::where('id', $id)->first()->delete();
        return redirect('/admin/events');
    }

    public function deleteEnroll($id)
    {
        AnonimRequest::where('id', $id)->first()->delete();
        return redirect()->back();   
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
        $events = Event::where('type', 'hidden')->get();
        $visits = Visit::all();
        $enrolls = AnonimRequest::where('status', 'fresh')->with('user')->get();
        $calendarData = [];

        foreach ($events as $key => $event) {
            array_push($calendarData, [
                'title' => $event->name,
                'start' => $event->event_date_start,
                'end' => $event->event_date_end,
                'color' => '#5b5b5b',
                'link' => 'events/'.$event->id,
            ]);
        }

        foreach ($visits as $key => $visit) {
            array_push($calendarData, [
                'title' => $visit->user['name'],
                'start' => $visit->visit_date,
                'color' => '#4eb35a',
                'link' => 'visit-edit/'.$visit->id,
            ]);
        }

        foreach ($enrolls as $key => $enroll) {
            array_push($calendarData, [
                'title' => $enroll->user->name,
                'start' => $enroll->date,
                'color' => '#8b99f6',
                'link' => 'visit/'.$enroll->user->id.'/'.$enroll->id,
            ]);
        }

        $upcomingEnrolls = AnonimRequest::where('status', 'fresh')->whereDate('date', '>=', date('Y-m-d', time()) )->whereTime('date', '>=', date('H:i:m', time()))->with('user')->get();

    	return view('admin_cabinet.calendar')->with(['calendarData' => collect($calendarData), 'enrolls' => $upcomingEnrolls]);
    }
}
