<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:10 PM
 */

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;
use Yii;

class Slider extends Widget {

    public function run()
    {
        $models = Post::find()->where('status>-1 AND ban=1')->orderBy(['id' => SORT_DESC])->limit(Yii::$app->params['slider_limit'])->all();
        return $this->render('slider', ['models' => $models]);
    }
}