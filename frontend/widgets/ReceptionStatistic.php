<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:43 PM
 */

namespace frontend\widgets;

use common\models\Reception;
use common\models\Settings;
use Yii;
use yii\base\Widget;

class ReceptionStatistic extends Widget {

    public $type;
    public $view;
    protected $allow;
    protected $data;
    const RECEPTION_FROM_SITE = 'site';
    const RECEPTION_MANUAL = 'manual';
    const VIEW_LANDSCAPE = 'landscape';
    const VIEW_PORTRAIT = 'portrait';

    public function init()
    {
        parent::init();
        if(!$this->view){
            $this->view = self::VIEW_LANDSCAPE;
        }
        if($this->type == self::RECEPTION_FROM_SITE){
            $title = Yii::t('main','Статистика обращений с сайта');
            $total = Reception::find()->count();
            $physc = Reception::find()->where(['person_type' => Reception::PERSON_PHYSIC])->count();
            $legal = Reception::find()->where(['person_type' => Reception::PERSON_LEGAL])->count();
            $rcved = Reception::find()->where(['status' => Reception::STATUS_RECEIVED])->count();
            $inprg = Reception::find()->where(['status' => Reception::STATUS_WORKING])->count();
            $done = Reception::find()->where(['status' => Reception::STATUS_DONE])->count();
            //$total = $physc + $legal + $rcved + $inprg + $done;
            $physc_f = $physc > 0 ? round($physc / $total * 100, 2) : 0;
            $legal_f = $legal > 0 ? round($legal / $total * 100, 2) : 0;
            $rcved_f = $rcved > 0 ? round($rcved / $total * 100, 2) : 0;
            $inprg_f = $inprg > 0 ? round($inprg / $total * 100, 2) : 0;
            $done_f = $done > 0 ? round($done / $total * 100, 2) : 0;
            $strdate = date('Y.m.d', Reception::find()->orderBy('time')->one()->time);
            $enddate = date('Y.m.d');
            $upddate = date('Y.m.d');
            $this->data = [
                'title' => $title,
                'total' => $total,
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
            $this->allow = true;
        } elseif ($this->type == self::RECEPTION_MANUAL){
            $manrec = Settings::findOne(Reception::MANUAL_RECEPTION);
            if ($manrec) {
                $manrec = $manrec->val;
            }else {
                $mdl = new Settings();
                $manrec = json_encode(['physc' => 0, 'legal' => 0, 'rcved' => 0, 'inprg' => 0, 'done' => 0, 'start_date' => 0, 'end_date' => 0, 'updated_date' => time()]);
                $mdl->id = Reception::MANUAL_RECEPTION;
                $mdl->val = $manrec;
                $mdl->save();
            }
            $manrec = json_decode($manrec);
            $title = Yii::t('main','Статистика обращений');
            $m_total = $manrec->physc + $manrec->legal;
            $m_physc = $manrec->physc;
            $m_legal = $manrec->legal;
            $m_rcved = $manrec->rcved;
            $m_inprg = $manrec->inprg;
            $m_done = $manrec->done;
            $m_physc_f = $m_physc > 0 ? round($m_physc / $m_total * 100, 2) : 0;
            $m_legal_f = $m_legal > 0 ? round($m_legal / $m_total * 100, 2) : 0;
            $m_rcved_f = $m_rcved > 0 ? round($m_rcved / $m_total * 100, 2) : 0;
            $m_inprg_f = $m_inprg > 0 ? round($m_inprg / $m_total * 100, 2) : 0;
            $m_done_f = $m_done > 0 ? round($m_done / $m_total * 100, 2) : 0;
            $m_strdate = $manrec->start_date;
            $m_enddate = $manrec->end_date;
            $m_upddate = $manrec->updated_date;
            $this->data = [
                'title' => $title,
                'total' => $m_total,
                'physc' => $m_physc,
                'legal' => $m_legal,
                'rcved' => $m_rcved,
                'inprg' => $m_inprg,
                'done' => $m_done,
                'physc_f' => $m_physc_f,
                'legal_f' => $m_legal_f,
                'rcved_f' => $m_rcved_f,
                'inprg_f' => $m_inprg_f,
                'done_f' => $m_done_f,
                'strdate' => $m_strdate,
                'enddate' => $m_enddate,
                'upddate' => $m_upddate,
                'allow' => true,
                'view' => $this->view,
            ];
        } else {
            $this->data = ['allow' => false];
        }
    }

    public function run()
    {
        return $this->render('recstat', $this->data);
    }
}