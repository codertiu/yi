<?php
namespace  frontend\widgets;

use yii\base\Widget;

class Tab extends Widget
{
    public function run()
    {
        return $this->render('tab');
    }
}