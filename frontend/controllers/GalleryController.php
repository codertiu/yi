<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/13/16
 * Time: 10:49 PM
 */

namespace frontend\controllers;

use common\components\Controller;
use common\models\Album;
use common\models\Image;
use Yii;

class GalleryController extends Controller {

    public function actionAlbums()
    {
        $models = Album::find()->where('status>-1')->orderBy(['id' => SORT_DESC])->limit(Yii::$app->params['album_limit'])->all();
        return $this->render('albums', ['models' => $models]);
    }

    public function actionAlbum($id) {
        $model = Album::findOne($id);
        if($model) {
            $model->seen_count++;
            $model->save();
            $images = Image::find()->where('status>-1 AND album='.$id)->orderBy(['id' => SORT_DESC])->all();
            return $this->render('album', ['model' => $model, 'images' => $images]);
        }

        return $this->referrer();
    }

}
