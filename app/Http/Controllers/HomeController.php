<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Visit;
use App\Event;
use App\AnonimRequest;
use App\QuestionSubscription;
use App\Services\GoogleCalendar;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GoogleCalendar $google)
    {   

        // $calendarId = "cynerdemid@gmail.com";
        // $result = $google->get($calendarId);
        
        $events = Event::orderBy('id', 'desc')->take(5)->get();

        return view('welcome', compact('events'));
    }

    public function reviews()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();

        return view('reviews', compact('events'));
    }

    public function questions()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();

        return view('questions', compact('events'));
    }

    public function contacts()
    {   
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('contacts', compact('events') );
    }

    public function about()
    {   
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('about-doctor', compact('events'));
    }

    public function diseases()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('diseases', compact('events'));
    }

    public function treatment()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('treatments', compact('events'));
    }

    public function pricing()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('pricing', compact('events'));
    }

    public function diseaseMan()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('disease-man', compact('events'));
    }

    public function diseaseWooman()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('disease-wooman', compact('events'));
    }

    public function diseaseKidneys()
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();
        return view('disease-kidneys', compact('events'));
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
        //$validator->errors()->keys();

        $userRequest = new AnonimRequest();

        $userRequest->name = $request->patient_name;
        $userRequest->phone = $request->patient_phone;
        $userRequest->email = $request->patient_email;
        //$userRequest->date = $request->patient_visit_date . ' ' . $request->patient_visit_time;
        $userRequest->complaints = $request->patient_complaints;
        $userRequest->save();

        return back();
    }

    public function createQuestion(Request $request)
    {   
    
        $validator = Validator::make($request->all(), [
            // 'question_name' => 'required|min:15',
            'question_email' => 'required|email',
            'question_complaints' => 'min:30'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withInput()
                        ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()))
                        ->with('thanks_block', true);
        }
        //$validator->errors()->keys();

        $subscription = new QuestionSubscription();

        $subscription->name = strlen($request->question_name) > 0 ? $request->question_name: 'Аноним';
        $subscription->email = $request->question_email;
        $subscription->complaints = $request->question_complaints;
        $subscription->subscribe = $request->question_subscription === 'on' ? 1 : 0;
        $subscription->save();

        return back()->with('thanks_block', true);
    }
}
