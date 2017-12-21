<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class PatientsDimmer extends AbstractWidget
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
        $count = \App\User::where('role_id', 2)->count();
        $string = trans_choice('voyager.dimmer.page', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-people',
            'title'  => "Пациенты",
            'text'   => "Всего {$count}",
            'button' => [
                'text' => __('Все Пациенты'),
                'link' => route('voyager.users.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
