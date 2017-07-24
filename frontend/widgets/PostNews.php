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

class PostNews extends Widget {

    public $limit = false;

    public function run()
    {
        //$limit = $this->limit === false ? Yii::$app->params['ad_limit'] : $this->limit;
        $models = Post::getModels(Post::UZB_NEWS,1,4, true);
        $models2 = Post::getModels(Post::TENDERS_KONKURS,1,4, true);
        return $this->render('post_news', ['models' => $models, 'models2' => $models2]);
    }

}