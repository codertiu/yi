<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:04 PM
 */

namespace frontend\widgets;

use common\components\StaticFunctions;
use Yii;
use yii\base\Widget;

class Header extends Widget {

    public function run()
    {
        $langs = StaticFunctions::getLangs();
        $speech = Yii::$app->request->cookies->getValue('speech', 0) == 0 ?  Yii::t('main','Ёқиш') : Yii::t('main','Ўчириш');
        return $this->render('header', ['langs' => $langs, 'speech' => $speech]);
    }

}