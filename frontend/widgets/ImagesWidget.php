<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/16
 * Time: 4:33 PM
 */

namespace frontend\widgets;

use common\models\Image;
use yii\base\Widget;

class ImagesWidget extends Widget {

    public $limit = 6;

    public function run()
    {
        $models = Image::find()->where('status>-1')->orderBy(['id' => SORT_DESC])->limit($this->limit)->all();
        return $this->render('imagesWidget', ['models' => $models]);
    }

}