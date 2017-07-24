<?php

namespace frontend\widgets;

use common\models\Settings;
use yii\base\Widget;
use Yii;

class MiniRectangleBanner extends Widget {

    public function run()
    {
        $model = Settings::findOne('mini_rectangle_banner')->getLang();
        $rectangle_banner_query = Yii::$app->db->createCommand('Select * from `settings` where `id` = "mini_rectangle_banner"')->queryOne();

        return $this->render('miniRectangleBanner', ['model' => $model, 'rectangle_banner_query' => $rectangle_banner_query]);
    }

}