<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:33 PM
 */

namespace frontend\widgets\menu;

use common\models\Menu;
use yii\base\Widget;

class LeftMenu extends Widget {

    public function run()
    {
        $models = Menu::find()->where('status>-1 AND type='.Menu::LEFT_SIDE)->orderBy(['order_by' => SORT_ASC])->all();
        return $this->render('leftMenu',['models' => $models]);
    }

}