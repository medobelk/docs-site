<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Visit;
use App\AnonimRequest;
use App\Question;
use App\Review;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cabinet()
    {   
        $visit = Visit::where('user_id', Auth::user()->id)->orderBy('visit_date', 'desc')->first();
    	return view('patient_cabinet.cabinet')->with(['visit' => $visit, 'user' => Auth::user()]);
    }

    public function question()
    {   
        $user_id = Auth::user()->id;
        $questions = Question::where('user_id', $user_id)->orderBy('created_at', 'desc')->get(['id', 'complaints', 'created_at']);
    	return view('patient_cabinet.question')->with('questions', $questions);
    }

    public function review()
    {
    	return view('patient_cabinet.review');
    }

    public function enroll()
    {
    	return view('patient_cabinet.enroll')->with('user', Auth::user());
    }

    public function visit($id)
    {
        $visit = Visit::where('id', $id)->first();
        return view('patient_cabinet.cabinet')->with(['visit' => $visit, 'user' => Auth::user()]);
    }

    public function addQuestion(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'question' => 'required|min:30'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withInput()
                        ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $user = Auth::user();

        $question = new Question();
        $question->name = $user->name;
        $question->email = $user->email;
        $question->complaints = $request->question;
        $question->user_id = $user->id;
        $question->subscribe = 1;
        $question->save();

        return back();
    }

    public function addReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'review' => 'required|min:30'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withInput()
                        ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $user = Auth::user();

        $review = new Review();
        $review->user_id = $user->id;
        $review->status = "PENDING";
        $review->authority = $request->name === 'anonim' ? "ANONIM" : "USER";
        $review->body = $request->review;
        $review->save();

        return back();
    }

    public function addEnroll(Request $request)
    {   
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'phone' => [
                'required',
                'regex:/^(\+380[1-9][0-9]{8}|0[1-9][0-9]{8})$/'
            ],
            'date' => ['required'],
            'complaints' => [
                'required',
                'min:30'
            ]
        ]);

        if ($validator->fails()) {
            return back()
                        ->withInput()
                        ->with('form_errors', array_combine($validator->errors()->keys(), $validator->errors()->all()));
        }

        $enroll = new AnonimRequest();
        $enroll->name = $user->name;
        $enroll->phone = $request->phone;
        $enroll->email = $user->email;
        $enroll->complaints = $request->complaints;
        $enroll->date = $request->date;
        $enroll->status = 'fresh';
        $enroll->save();

        return back();
    }
}
