<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Event;
use App\Visit;

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
}
