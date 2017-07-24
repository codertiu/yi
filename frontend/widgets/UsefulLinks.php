<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:48 PM
 */

namespace frontend\widgets;

use common\models\Menu;
use yii\base\Widget;

class UsefulLinks extends Widget {

    public function run()
    {
        $models = Menu::getModels(Menu::USEFUL,true);
        return $this->render('usefulLinks', ['models' => $models]);
    }

}