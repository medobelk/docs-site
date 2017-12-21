<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class QuestionsDimmer extends AbstractWidget
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
        $count = \App\Question::count();
        $string = trans_choice('voyager.dimmer.page', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "Вопросы",
            'text'   => "Всего {$count}",
            'button' => [
                'text' => "Все вопросы",
                'link' => route('voyager.questions.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
