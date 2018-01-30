<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Event;
use App\Visit;
use App\AnonimRequest;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->composeSidebar();
        $this->composeEnrollForm();
        $this->composeCalendar();
        $this->composeFooterReviews();
        $this->composeAdminSidebar();
        $this->composePatientSidebar();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeSidebar()
    {   
        view()->composer('layouts.sidebar', function ($view)
        {
            $view->with('events', Event::where('type', 'published')->orderBy('id', 'desc')->take(5)->get());
        });
    }

    public function composeAdminSidebar()
    {
        view()->composer('admin_cabinet.patients-sidebar', function ($view)
        {
            $view->with('sidebarUsers', User::where('role_id', 2)->get());
        });
    }

    public function composePatientSidebar()
    {
        view()->composer('patient_cabinet.sidebar', function ($view)
        {
            $view->with( 'sidebarVisits', Visit::where('user_id', Auth::user()->id)->orderBy('visit_date', 'desc')->get() );
        });
    }

    public function composeEnrollForm()
    {   
        view()->composer('layouts.enroll-dates-handler', function ($view)
        {
            $availableHours = [
                    9,
                    10,
                    11,
                    12,
                    13,
                    14,
                    15,
                    16,
                    17,
                    18,
            ];

            $availableDateHours = [];

            $visits = Visit::whereDate('visit_date', '>', date('Y-m-d'))->get(['visit_date AS date'])->toArray();
            $events = Event::whereDate('event_date_start', '>', date('Y-m-d'))->get(['event_date_start AS date', 'event_date_end AS date_end'])->toArray();
            $busy = array_merge($visits, $events);

            foreach ($busy as $value) {
                if( array_key_exists( 'date_end', $value) ){
                    $start = new DateTime($value['date']);
                    $end = new DateTime($value['date_end']);
                    $diff = $end->diff($start);

                    $startUnix = strtotime($value['date']); 
                    $endUnix = strtotime($value['date_end']);

                    if( $diff->days > 0 ){
                        if( array_key_exists( $start->format("Y-n-j"), $availableDateHours) ){
                            foreach( $availableHours as $defaultHour ){
                                if( $start->format("G") <= $defaultHour ){
                                    array_push( $availableDateHours[ $start->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }else{
                            $availableDateHours[ $start->format("Y-n-j") ] = [];
                            foreach( $availableHours as $defaultHour ){
                                if( $start->format("G") <= $defaultHour ){
                                    array_push( $availableDateHours[ $start->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }
                        if( array_key_exists( $end->format("Y-n-j"), $availableDateHours) ){
                            foreach( $availableHours as $defaultHour ){
                                if( $end->format("G") >= $defaultHour && $end->format("G") > $defaultHour ){
                                    array_push( $availableDateHours[ $end->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }else{
                            $availableDateHours[ $end->format("Y-n-j") ] = [];
                            foreach( $availableHours as $defaultHour ){
                                if( $end->format("G") >= $defaultHour && $end->format("G") > $defaultHour ){
                                    array_push( $availableDateHours[ $end->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }
                        for ($dayBetween = $startUnix; $dayBetween <= $endUnix; $dayBetween += 86400) {  
                            if( date("Y-m-d", $dayBetween) !== $start->format('Y-m-d') && date("Y-m-d", $dayBetween) !== $end->format('Y-m-d') ){
                                foreach( $availableHours as $defaultHour ){
                                    if( array_key_exists( date( "Y-n-j", $dayBetween), $availableDateHours) ){
                                        array_push( $availableDateHours[ date( "Y-n-j", $dayBetween ) ], $defaultHour.":00:00" );
                                    }else{
                                        $availableDateHours[ date( "Y-n-j", $dayBetween ) ] = [];
                                        array_push( $availableDateHours[ date( "Y-n-j", $dayBetween ) ], $defaultHour.":00:00" );
                                    }
                                }
                            }  
                        } 
                    }else{
                        if( array_key_exists( $start->format("Y-n-j"), $availableDateHours) ){
                            foreach( $availableHours as $defaultHour ){
                                if( $start->format("G") <= $defaultHour && $end->format("G") > $defaultHour ){
                                    array_push( $availableDateHours[ $start->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }else{
                            $availableDateHours[ $start->format("Y-n-j") ] = [];
                            foreach( $availableHours as $defaultHour ){
                                if( $start->format("G") <= $defaultHour && $end->format("G") > $defaultHour ){
                                    array_push( $availableDateHours[ $start->format("Y-n-j") ],  $defaultHour.":00:00" );
                                }
                            }
                        }
                    }
                }else{
                    if( array_key_exists( date( "Y-n-j", strtotime($value['date']) ), $availableDateHours) ){
                        array_push( $availableDateHours[ date( "Y-n-j", strtotime($value['date']) ) ], date( "H:i:s", strtotime( $value['date'] ) ) );
                    }else{
                        $availableDateHours[ date( "Y-n-j", strtotime($value['date']) ) ] = [];
                        array_push( $availableDateHours[ date( "Y-n-j", strtotime($value['date']) ) ], date( "H:i:s", strtotime( $value['date'] ) ) );
                    }
                }
            }

            $view->with( 'availableDatesHours', collect( array_values([$availableDateHours]) ) );

        });
    }

    public function composeCalendar()
    {
        view()->composer('voyager_custom.calendar', function ($view)
        {
        
            $calendarData = [];
            $visits = Visit::all(['name', 'visit_date'])->toArray();
            $events = Event::all(['name', 'event_date'])->toArray();
            $enrolls = AnonimRequest::where('status', 'fresh')->get(['name', 'date'])->toArray();
            $calendarData = array_merge($visits, $events, $enrolls);
            
            foreach ($calendarData as $key => $event) {

                if(array_key_exists('visit_date', $event) ){
                    
                    if( $event['visit_date'] ){
                        $calendarData[$key]['title'] = 'Визит ' . $event['name'];
                        unset($calendarData[$key]['name']);
                        $calendarData[$key]['start'] = date('c', strtotime( $event['visit_date']) );
                        unset($calendarData[$key]['visit_date']);
                        $calendarData[$key]['color'] = 'red';
                    }else{
                        unset($calendarData[$key]);
                    }
                }

                if(array_key_exists('event_date', $event) ){
                    if( $event['event_date'] ){
                        $calendarData[$key]['title'] = 'Событие ' . $event['name'];
                        unset($calendarData[$key]['name']);
                        $calendarData[$key]['start'] = date('c', strtotime($event['event_date']) );
                        unset($calendarData[$key]['event_date']);
                        $calendarData[$key]['color'] = 'grey';
                    }else{
                        unset($calendarData[$key]);
                    }
                }

                if(array_key_exists('date', $event) ){
                    if( $event['date'] ){
                        $calendarData[$key]['title'] = 'Запрос ' . $event['name'];
                        unset($calendarData[$key]['name']);
                        $calendarData[$key]['start'] = date('c', strtotime($event['date']) );
                        unset($calendarData[$key]['date']);
                        $calendarData[$key]['color'] = 'green';
                    }else{
                        unset($calendarData[$key]);
                    }
                }
            }

            $calendarData = collect( array_values($calendarData) );

            $view->with( 'calendarData', $calendarData );
        });
    }

    public function composeFooterReviews()
    {
        view()->composer('layouts.footer', function ($view)
        {
            $reviews = Review::where('status', 'APPROVED')->orderBy('updated_at', 'desc')->with('user')->take(6)->get();
            $view->with( 'footerReviews', $reviews );
        });
    }
}
