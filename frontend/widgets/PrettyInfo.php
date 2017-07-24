<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 5:05 PM
 */

namespace frontend\widgets;

use yii\base\Widget;

class PrettyInfo extends Widget {

    public function run()
    {
        return $this->render('prettyInfo');
    }

}