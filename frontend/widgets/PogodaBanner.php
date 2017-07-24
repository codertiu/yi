<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:32 PM
 */

namespace frontend\widgets;


use yii\base\Widget;

class PogodaBanner extends Widget
{
    public function run()
    {
        return $this->render('pogodaBanner');
    }
}