<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/16/16
 * Time: 5:00 PM
 */

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class Useful extends Widget {

    public function run()
    {
        $model = Post::find()->where('status>-1 AND category='.Post::USEFUL)->orderBy(['id' => SORT_DESC]);
        if($model->exists()) {
            $model = $model->one();
            return $this->render('useful', ['model' => $model]);
        }
        return false;
    }

}