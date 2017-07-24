<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/9/16
 * Time: 9:48 PM
 */

namespace frontend\widgets;

use yii\base\Widget;
use Yii;

class PostNewsPreview extends Widget {

    public $model;

    public $mini = false;

    public function run()
    {
        $dir = realpath(dirname(__FILE__)).'/../..'.Yii::$app->params['images_dir'].'original/';
        $model = $this->model;
        $image = $model->main_image && file_exists($dir.$model->main_image) ? Yii::$app->params['images_path'].'original/' . $model->main_image : Yii::$app->params['default_post_image'];
       // $view = $this->mini ? 'postNewsPreviewMini' : 'postNewsPreview';
        $view = 'postNewsPreview';
        return $this->render($view, [
            'image' => $image,
            'title' => $model->title,
            'anons' => $model->anons,
            'created_date' => $model->created_date,
            'seen_count' => $model->seen_count,
            'id' => $model->id,
        ]);
    }

}