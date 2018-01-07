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

class CabinetAdminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cabinet()
    {   
    	return view('admin_cabinet.cabinet');
    }

    public function patients($id = null)
    {	
    	$users = User::where('role_id', 2)->get();
    	$user = collect(['id' => 0, 'name' => '', 'email' => '', 'phone' => '', 'birth_date' => '', 'password' => '']);
    	if( $id !== null ){
    		$user = User::where('id', $id)->first()->toArray();
    	}
    	return view('admin_cabinet.cabinet')->with(['users' => $users, 'user' => $user]);
    }

    public function editAddPatients(Request $request, $id = null)
    {	
    	$passwordRule = $id !== null ? 'required' : '';

    	$validator = Validator::make($request->all(), [
            'name' => 'required|min:15',
            'email' => 'required|email',
            'password' => $passwordRule,
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

        
        if( $id !== null ){
        	$user = User::where('id', $id)->first();
        }else{
        	$user = new User();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if( strlen( $passwordRule ) > 0 ){
        	$user->password = $request->password; //Hash::make($request->password);
        }
        $user->birth_date = $request->birth_date;
        $user->save();

        //mail

        return redirect("admin/patients/$user->id");

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

    public function calendar()
    {
    	return view('admin_cabinet.calendar');
    }
}
