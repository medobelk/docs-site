<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Event;
use App\Visit;
use App\AnonimRequest;

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
            $view->with('events', Event::orderBy('id', 'desc')->take(5)->get());
        });
    }

    public function composeEnrollForm()
    {   
        view()->composer('layouts.enroll-dates-handler', function ($view)
        {
            $availableHours = [
                    "10:00:00",
                    "11:00:00",
                    "12:00:00",
                    "13:00:00",
                    "14:00:00",
                    "15:00:00",
                    "16:00:00",
                    "17:00:00",
                    "18:00:00",
            ];

            $availableDateHours = [];

            $visitsRegistered = Visit::whereDate('visit_date', '>', date('Y-m-d'))->get(['visit_date'])->toArray();

            foreach ($visitsRegistered as $value) {

                if( array_key_exists( date( "Y-n-j", strtotime($value['visit_date']) ), $availableDateHours) ){
                    array_push( $availableDateHours[ date( "Y-n-j", strtotime($value['visit_date']) ) ], date( "H:i:s", strtotime( $value['visit_date'] ) ) );
                }else{
                    $availableDateHours[ date( "Y-n-j", strtotime($value['visit_date']) ) ] = [];
                    array_push( $availableDateHours[ date( "Y-n-j", strtotime($value['visit_date']) ) ], date( "H:i:s", strtotime( $value['visit_date'] ) ) );
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
}
