<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:20 PM
 */

namespace frontend\widgets\menu;

use yii\base\Widget;
use common\components\StaticFunctions;
use Yii;

class BannerMenu extends Widget {

    public function run()
    {
        $langs = StaticFunctions::getLangs();
        $speech = Yii::$app->request->cookies->getValue('speech', 0) == 1 ? Yii::t('main','Ўчириш') : Yii::t('main','Ёқиш');
        return $this->render('bannerMenu',['langs' => $langs, 'speech' => $speech]);
    }

}
