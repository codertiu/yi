<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:49 PM
 */

namespace frontend\widgets;


use yii\base\Widget;

class RoadMap extends Widget
{
    public function run()
    {
        return $this->render('roadMap');
    }
}