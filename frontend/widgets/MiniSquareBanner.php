<?php

namespace frontend\widgets;

use common\models\Post;
use common\models\Settings;
use yii\base\Widget;
use Yii;

class MiniSquareBanner extends Widget {

    public function run()
    {
        $model = Settings::findOne('mini_square_banner')->getLang();
        $square_banner_query = Yii::$app->db->createCommand('Select * from `settings` where `id` = "mini_square_banner"')->queryOne();

            return $this->render('miniSquareBanner', ['model' => $model, 'square_banner_query' => $square_banner_query]);
    }

}