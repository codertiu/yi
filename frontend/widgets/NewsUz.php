<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:53 PM
 */

namespace frontend\widgets;


use yii\base\Widget;

class NewsUz extends Widget
{
    public function run()
    {
        return $this->render('newsUz');
    }
}