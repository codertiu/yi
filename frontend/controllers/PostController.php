<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/11/16
 * Time: 6:34 PM
 */

namespace frontend\controllers;

use common\components\Controller;
use common\models\Post;
use common\models\PostCategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
class PostController extends Controller {

    public function actionView($id) {

        $model = Post::findOne($id);

        if($model) {
            $model->seen_count ++;
            $model->save();
            return $this->render('view', ['model' => $model]);
        }

        return $this->referrer();

    }

    public function actionByCat($id) {

        if($model = PostCategory::findOne($id)) {
            $name = $model->getLang('name');
            $where = Post::getWhere($id,1);
            $query = Post::find()->leftJoin('post_lang', 'post.id=post_lang.parent')->where($where)->asArray();
            $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => Yii::$app->params['post_limit']
                ],
                'sort' => [
                    'defaultOrder' => [
                        'id' => SORT_DESC
                    ]
                ]
            ]);
//            echo '<pre>';
//            print_r($provider->getModels());
//            echo '</pre>';
//            exit;
            return $this->render('byCat', ['provider' => $provider, 'name' => $name]);
        }
        return $this->referrer();
    }

    public function actionPrint($id) {
        if($model = Post::findOne($id)) {
            $this->layout = 'print';
            return $this->render('print',['model' => $model]);
        }
        return $this->referrer();
    }

}