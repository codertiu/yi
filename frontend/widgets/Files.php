<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/14/16
 * Time: 12:26 PM
 */

namespace frontend\widgets;

use common\models\Attach;
use yii\base\Widget;

class Files extends Widget {

    public $section;
    public $parent;
    public $limit = 10;
    public $admin = false;

    public function run()
    {
        $models = Attach::find()->where('status>-1 AND section='.$this->section.' AND parent='.$this->parent)->limit($this->limit)->orderBy(['id' => SORT_DESC])->all();
        return $this->render('files', ['models' => $models, 'admin' => $this->admin]);
    }

}