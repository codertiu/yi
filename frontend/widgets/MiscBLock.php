<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:28 PM
 */


namespace frontend\widgets;

use common\components\StaticFunctions;
use common\models\Menu;
use common\models\MenuLang;
use yii\base\Widget;

class MiscBLock extends Widget {

    public function run()
    {
        return $this->render('miscBlock');
    }

}