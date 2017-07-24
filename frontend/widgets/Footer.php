<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:13 PM
 */

namespace frontend\widgets;

use yii\base\Widget;

class Footer extends Widget {

    public function run()
    {
        return $this->render('footer');
    }

}