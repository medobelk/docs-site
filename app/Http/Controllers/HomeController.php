<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Visit;
use App\Event;
use App\AnonimRequest;

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
    public function index(Request $request)
    {
        $events = Event::orderBy('id', 'desc')->take(5)->get();

        return view('welcome', compact('events'));
    }

    public function contacts()
    {
        return view('contacts');
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
            return redirect('/')
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

        return redirect('/');
    }
}
