<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 2:59 PM
 */

namespace frontend\widgets\menu;

use common\models\Menu;
use yii\base\Widget;
use common\components\StaticFunctions;
class HeaderMenu extends Widget {

    public function run()
    {
        $langs = StaticFunctions::getLangs();
        $models = Menu::find()->where('type='.Menu::HEADER.' and status>-1 AND parent is not null')->orderBy(['order_by' => SORT_ASC])->all();
        return $this->render('headerMenu',compact('models','langs'));
    }

}