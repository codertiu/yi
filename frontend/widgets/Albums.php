<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/12/16
 * Time: 4:33 PM
 */

namespace frontend\widgets;

use common\models\Album;
use yii\base\Widget;

class Albums extends Widget {

    public $limit = 4;

    public function run()
    {
        $models = Album::find()->where('status>-1')->orderBy(['id' => SORT_DESC])->limit($this->limit)->all();
        return $this->render('albumsWidget', ['models' => $models]);
    }

}