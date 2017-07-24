<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:04 PM
 */

namespace frontend\widgets;

use common\components\StaticFunctions;
use common\models\Menu;
use common\models\MenuLang;
use yii\base\Widget;

class MiddleBlock extends Widget {

    public function run()
    {
        $models1 = Menu::getModels(Menu::SERVICES,true);
        $models2 = Menu::getModels(Menu::GOVERMENT, true);
        $models3 = Menu::getModels(Menu::OPEN_DATA, true);
        return $this->render('middleBlock', [
            'models1' => $models1,
            'models2' => $models2,
            'models3' => $models3,
        ]);
    }

}