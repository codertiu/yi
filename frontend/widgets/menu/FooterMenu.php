<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:17 PM
 */

namespace frontend\widgets\menu;

use common\models\Menu;
use yii\base\Widget;

class FooterMenu extends Widget {

    public function run()
    {
        $models1 = Menu::getModels(Menu::FOOTER,true);
        $models2 = Menu::getModels(Menu::FOOTER2,true);
        return $this->render('footerMenu',['models1' => $models1, 'models2' => $models2]);
    }

}