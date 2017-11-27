<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleCalendar {

    protected $client;

    protected $service;

    function __construct() {
        /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key_file_location = base_path() . Config::get('google.key_file_location');
        $key = base_path() . Config::get('google.key_file_location');
        // $key = file_get_contents($key_file_location);
        $scopes = array('https://www.googleapis.com/auth/calendar');

        $this->client = new \Google_Client();
        $this->client->setApplicationName("Medobelks Calendar");
        $this->client->setScopes($scopes);
        $this->client->setAuthConfig($key);
        $this->client->setAccessType('offline');
        $this->service = new \Google_Service_Calendar($this->client);

        /* If we have an access token */
        if (Cache::has('service_token')) {
          //$this->client->setAccessToken(Cache::get('service_token'));
        }

        
        /* Add the scopes you need */
        
        // $cred = new \Google_Auth_AssertionCredentials(
        //     $service_account_name,
        //     $scopes,
        //     $key
        // );

        // $this->client->setAssertionCredentials($cred);

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