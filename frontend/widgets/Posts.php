<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:12 PM
 */

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class Posts extends Widget {

    public $limit = false;

    public function run()
    {
        //$limit = $this->limit === false ? Yii::$app->params['ad_limit'] : $this->limit;
        $models = Post::getModels(Post::HOLDING_NEWS,1,5, true);
        $models2 = Post::getModels(Post::AD,1,5, true);
        return $this->render('posts', ['models' => $models, 'models2' => $models2]);
    }

}