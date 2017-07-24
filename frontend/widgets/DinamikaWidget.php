<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 4:50 PM
 */

namespace frontend\widgets;


use yii\base\Widget;

class DinamikaWidget extends Widget
{
    public function run()
    {
        return $this->render('dinamikChart');
    }
}