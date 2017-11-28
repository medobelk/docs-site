<?php 

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleCalendar {

    protected $client;

    protected $service;

    function __construct() {

        $this->client = new \Google_Client();
        $this->client->setApplicationName("MEDOBELKS TESTS");        
        $this->client->setAuthConfig( base_path() . '/resources/assets/me-service-acc-pass.json' );
        $scopes = array('https://www.googleapis.com/auth/calendar'); //array('Google_Service_Calendar::CALENDAR_READONLY');
        $this->client->setScopes($scopes);

        $user_to_impersonate = 'cynerdemid@gmail.com';
        $this->client->setSubject($user_to_impersonate);

        $this->service = new \Google_Service_Calendar($this->client);

        /* If we have an access token */
        // if (Cache::has('service_token')) {
        //   $this->client->setAccessToken(Cache::get('service_token'));
        // }

        // if ($this->client->getAuth()->isAccessTokenExpired()) {
        //   $this->client->getAuth()->refreshTokenWithAssertion($cred);
        // }
        // Cache::forever('service_token', $this->client->getAccessToken());
    }

    public function get($calendarId)
    {
        $results = $this->service->calendars->get($calendarId);
        dd($results);
    }
}