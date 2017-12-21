<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class RequestsDimmer extends AbstractWidget
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
        $count = \App\AnonimRequest::count();
        $string = trans_choice('voyager.dimmer.page', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-window-list',
            'title'  => "Заявки",
            'text'   => "Всего {$count}",
            'button' => [
                'text' => __('Все Заявки'),
                'link' => route('voyager.anonim-requests.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
