<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 5:32 PM
 */

namespace frontend\widgets;


use yii\base\Widget;
use Yii;
use common\models\Reception;

class Statistics extends Widget
{
    public $data;
    public function init()
    {
        $title = Yii::t('main', 'Статистика обращений с сайта');
       $total = Reception::find()->count();
        $physc = Reception::find()->where(['person_type' => Reception::PERSON_PHYSIC])->count();
        $legal = Reception::find()->where(['person_type' => Reception::PERSON_LEGAL])->count();
        $rcved = Reception::find()->where(['status' => Reception::STATUS_RECEIVED])->count();
        $inprg = Reception::find()->where(['status' => Reception::STATUS_WORKING])->count();
        $done = Reception::find()->where(['status' => Reception::STATUS_DONE])->count();
        $total2 = $rcved + $inprg + $done;
        $physc_f = $physc > 0 ? round($physc / $total * 100, 2) : 0;
        $legal_f = $legal > 0 ? round($legal / $total * 100, 2) : 0;
        $rcved_f = $rcved > 0 ? round($rcved / $total2 * 100, 2) : 0;
        $inprg_f = $inprg > 0 ? round($inprg / $total2 * 100, 2) : 0;
        $done_f = $done > 0 ? round($done / $total2 * 100, 2) : 0;
        $strdate = date('Y.m.d', Reception::find()->orderBy('time')->one()->time);
        $enddate = date('Y.m.d');
        $upddate = date('Y.m.d');
        $this->data = [
            'title' => $title,
            'total' => $total,
            'total2' => $total2,
            'physc' => $physc,
            'legal' => $legal,
            'rcved' => $rcved,
            'inprg' => $inprg,
            'done' => $done,
            'physc_f' => $physc_f,
            'legal_f' => $legal_f,
            'rcved_f' => $rcved_f,
            'inprg_f' => $inprg_f,
            'done_f' => $done_f,
            'strdate' => $strdate,
            'enddate' => $enddate,
            'upddate' => $upddate,
            'allow' => true,
            'view' => $this->view,
        ];
    }
    public function run()
    {
      return $this->render('receptionStat',   ['data'=>$this->data]);
    }
}