<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class VisitsDimmer extends AbstractWidget
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
        $count = \App\Visit::count();
        $string = trans_choice('voyager.dimmer.page', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-activity',
            'title'  => "Посещения",
            'text'   => "Всего {$count}",
            'button' => [
                'text' => __('Все Посещения'),
                'link' => route('voyager.visits.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
