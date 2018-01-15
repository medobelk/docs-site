<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use \Google_Client;
use \Google_Service_Calendar;
use \Google_Service_Calendar_Event;
use \Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected $client;
    public function __construct()
    {	
    	$this->middleware('auth');
        $client = new Google_Client();
		$client->setAuthConfig('client_secret.json');
		$client->addScope(\Google_Service_Calendar::CALENDAR);
		$client->setRedirectUri( action('CalendarController@oauth') );
		$client->setIncludeGrantedScopes(true);   // incremental auth

		$this->client = $client;
    }

    public function oauth(Request $request)
    {
    	if( $request->has('code') ){
			$this->client->authenticate($request->code);
			session()->put( 'accessToken', $this->client->getAccessToken() );
			return redirect( action('CalendarController@calendar') );
    	}else{
    		$auth_url = $this->client->createAuthUrl();
    		$filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
    		return redirect($filtered_url);	
    	}
    }

    public function calendar(Request $request)
    {	
    	if( session()->has('accessToken') ){
			$this->client->setAccessToken(session()->get('accessToken'));
			$drive = new \Google_Service_Calendar($this->client);
			$calendarId = 'primary';
            $results = $drive->events->listEvents($calendarId);
            $calendarData = [];
            foreach ($results->getItems() as $key => $event) {
            	array_push($calendarData, [
            		'title' => $event->summary,
            		'start' => $event->start->dateTime,
            		'color' => $event->colorId
            	]);
            }
	        return view('admin_cabinet.calendar')->with('calendarData', collect( $calendarData ) );
    	}else{
    		return redirect( action('CalendarController@oauth') );
    	}
    }
}
