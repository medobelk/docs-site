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

    public function index(Request $request)
    {   

        // $calendarId = "cynerdemid@gmail.com";
        // $result = $google->get($calendarId);

        // $user = new User;

        // $reviews = $user->data(2)->visits();
        // dd($reviews);


        return view('welcome');
    }

    public function erectDisfunction()
    {
        return view('infoPages.erect-disfunction');
    }

    public function pielonefrit()
    {
        return view('infoPages.pielonefrit');
    }

    public function prostatit()
    {
        return view('infoPages.prostatit');
    }

    public function uretrit()
    {
        return view('infoPages.uretrit');
    }

    public function zistit()
    {
        return view('infoPages.zistit');
    }

    public function setificates()
    {
        return view('infoPages.sertificates');
    }

    public function setificate()
    {
        return view('infoPages.sertificate');
    }

    public function reviews()
    {
        $reviews = Review::where('status', 'APPROVED')->with('user')->orderBy('created_at', 'desc')->take(6)->get();
        return view('reviews')->with(['reviews' => $reviews] );
    }

    public function questions()
    {
        $questions = Question::all()->toArray();

        $questionsLeftPart = array_slice($questions, 0, count($questions) / 2);
        $questionsMiddlePart = array_slice($questions, count($questions) / 2);

        return view('questions')->with([
           
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
        return view('contacts');
    }

    public function about()
    {   
        // $lastReview = Review::where('status', 'APPROVED')->orderBy('created_at', 'desc')->first();
        $lastReview = Review::where('status', 'APPROVED')->latest()->with('user')->first();

        return view('about-doctor')->with('review', $lastReview);
    }

    public function diseases()
    {
        return view('diseases');
    }

    public function treatment()
    {
        return view('treatments');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function diseaseMan()
    {
        return view('disease-man');
    }

    public function diseaseWooman()
    {
        return view('disease-wooman');
    }

    public function diseaseKidneys()
    {
        return view('disease-kidneys');
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

        //Mail::to( User::where('role_id', 3)->get() )->send( new EnrollRegistered( $userRequest ) );

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

        $subscription = new Question();

        $subscription->name = strlen($request->question_name) > 0 ? $request->question_name: 'Аноним';
        $subscription->email = $request->question_email;
        $subscription->complaints = $request->question_complaints;
        $subscription->subscribe = $request->question_subscription === 'on' ? 1 : 0;
        $subscription->save();

        return back()->with('thanks_block', 'questionTrue');
    }

    public function undefinderRouter($undfPath)
    {
        return view('errors.404');
    }
}
