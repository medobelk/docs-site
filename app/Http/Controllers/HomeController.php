<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Visit;
use App\Event;
use App\Review;
use App\AnonimRequest;
use App\Question;
use App\Answer;
use App\User;
use App\Mail\EnrollRegistered;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    public $events;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->events = Event::orderBy('id', 'desc')->take(5)->get();
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        // $calendarId = "cynerdemid@gmail.com";
        // $result = $google->get($calendarId);

        return view('welcome')->with('events', $this->events);
    }




    public function erectDisfunction()
    {
        return view('infoPages.erect-disfunction')->with('events', $this->events);
    }

    public function pielonefrit()
    {
        return view('infoPages.pielonefrit')->with('events', $this->events);
    }

    public function prostatit()
    {
        return view('infoPages.prostatit')->with('events', $this->events);
    }

    public function uretrit()
    {
        return view('infoPages.uretrit')->with('events', $this->events);
    }

    public function zistit()
    {
        return view('infoPages.zistit')->with('events', $this->events);
    }

    public function setificate()
    {
        return view('infoPages.sertificate')->with('events', $this->events);
    }




    public function reviews()
    {
        $reviews = Review::where('status', 'APPROVED')->with('user')->orderBy('created_at', 'desc')->take(6)->get();
        return view('reviews')->with( ['events' => $this->events, 'reviews' => $reviews] );
    }

    public function questions()
    {
        $questions = Question::all()->toArray();

        $questionsLeftPart = array_slice($questions, 0, count($questions) / 2);
        $questionsMiddlePart = array_slice($questions, count($questions) / 2);

        return view('questions')->with([
            'events' => $this->events,
            'questionsLeftPart' => $questionsLeftPart,
            'questionsMiddlePart' => $questionsMiddlePart
        ]);
    }

    public function dialogs(Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $answers = Answer::where('question_id', $id)->first();

        return view('dialog');
    }

    public function contacts()
    {   
        return view('contacts')->with('events', $this->events);
    }

    public function about()
    {   
        // $lastReview = Review::where('status', 'APPROVED')->orderBy('created_at', 'desc')->first();
        $lastReview = Review::where('status', 'APPROVED')->latest()->with('user')->first();

        return view('about-doctor')->with( ['events' => $this->events, 'review' => $lastReview]);
    }

    public function diseases()
    {
        return view('diseases')->with('events', $this->events);
    }

    public function treatment()
    {
        return view('treatments')->with('events', $this->events);
    }

    public function pricing()
    {
        return view('pricing')->with('events', $this->events);
    }

    public function diseaseMan()
    {
        return view('disease-man')->with('events', $this->events);
    }

    public function diseaseWooman()
    {
        return view('disease-wooman')->with('events', $this->events);
    }

    public function diseaseKidneys()
    {
        return view('disease-kidneys')->with('events', $this->events);
    }

    public function enroll(Request $request)
    {   
        // $validator = $request->validate([
        //     'patient_name' => 'required|min:15',
        //     'patient_phone' => [
        //         'required',
        //         'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/'
        //     ],
        //     'patient_email' => 'required|email',
        // ]);

        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|min:15',
            'patient_phone' => [
                'required',
                'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/'
            ],
            'patient_email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }
        $validator->errors()->keys();

        $userRequest = new AnonimRequest();

        $userRequest->name = $request->patient_name;
        $userRequest->phone = $request->patient_phone;
        $userRequest->email = $request->patient_email;
        //$userRequest->date = $request->patient_visit_date . ' ' . $request->patient_visit_time;
        $userRequest->complaints = $request->patient_complaints;
        $userRequest->save();

        Mail::to( User::where('role_id', 3)->get() )->send( new EnrollRegistered( $userRequest ) );

        return back()->with('thanks_block', 'enrollTrue');
    }

    public function createQuestion(Request $request)
    {   
    
        $validator = Validator::make($request->all(), [
            // 'question_name' => 'required|min:15',
            'question_email' => 'required|email',
            'question_complaints' => 'required|min:30'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withInput()
                        ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }
        //$validator->errors()->keys();

        $subscription = new QuestionSubscription();

        $subscription->name = strlen($request->question_name) > 0 ? $request->question_name: 'Аноним';
        $subscription->email = $request->question_email;
        $subscription->complaints = $request->question_complaints;
        $subscription->subscribe = $request->question_subscription === 'on' ? 1 : 0;
        $subscription->save();

        return back()->with('thanks_block', 'questionTrue');
    }
}
