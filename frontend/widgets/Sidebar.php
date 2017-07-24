<?php

namespace frontend\widgets;

use yii\base\Widget;

class Sidebar extends Widget
{
    public $setup = [];
    public $widgets = [];
    public $Weather;
    public $Menu;
    public $Poll;
    public $Banner;
    public $Banner2;
    public $Status;
    public $RStatistic;

    public function run()
    {
        return $this->render('sidebar', [
            'setup' => $this->setup,
            'widgets' => $this->widgets,
            'Banner' => $this->Banner,
            'Banner2' => $this->Banner2,
            'Poll' => $this->Poll,
            'Weather' => $this->Weather,
            'Status' => $this->Status,
            'RStatistic' => $this->RStatistic,
            'Menu' => $this->Menu,
        ]);
    }
}