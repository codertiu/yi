<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/13/16
 * Time: 12:27 PM
 */

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class MiniBanner extends Widget {

    public function run()
    {
        $model = Post::find()->where('status>-1 AND category='.Post::MINI_BANNER);
        if($model->exists()) {
            $model = $model->orderBy(['id' => SORT_DESC])->one();
            return $this->render('miniBanner', ['model' => $model]);
        }

        return false;
    }

}