<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:43 PM
 */

namespace frontend\widgets;

use yii\base\Widget;

class ReceptionStatus extends Widget {
    public function run()
    {
        parent::run();
        return $this->render('reception-status');
    }
}