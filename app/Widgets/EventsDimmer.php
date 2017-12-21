<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class EventsDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Event::count();
        $string = trans_choice('voyager.dimmer.page', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-bell',
            'title'  => "События",
            'text'   => "Всего {$count}",
            'button' => [
                'text' => __('Все События'),
                'link' => route('voyager.events.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
