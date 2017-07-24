<?php
/**
 * Created by PhpStorm.
 * User: BoXo
 * Date: 09.01.2017
 * Time: 17:28
 */

namespace frontend\widgets;


use yii\base\Widget;
use common\models\Menu;

class MenuWidget extends Widget
{
    public $uri;
    public function run()
    {
        $models = Menu::find()->where("`type` ='".Menu::HEADER."' AND `status` > -1 AND `url` LIKE '%".$this->uri."%'")->one();
        if(count($models) == 0){
            return false;
        }else {
            return $this->render('menuWidget', [
                'models' => $models,
            ]);
        }
    }
}