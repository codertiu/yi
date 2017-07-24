<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 4:50 PM
 */

namespace frontend\widgets;


use yii\base\Widget;
use common\models\Reception;
class PieChart extends Widget
{
    private $data;
    public function run()
    {
        $rcved = Reception::find()->where(['status' => Reception::STATUS_RECEIVED])->count();
        $inprg = Reception::find()->where(['status' => Reception::STATUS_WORKING])->count();
        $done = Reception::find()->where(['status' => Reception::STATUS_DONE])->count();
        $this->data = [
            'rcved' => $rcved,
            'inprg' => $inprg,
            'done' => $done,
             ];
        return $this->render('pieChart',['data' => $this->data]);
    }
}