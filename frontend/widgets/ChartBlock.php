<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:36 PM
 */

namespace frontend\widgets;

use common\models\Reception;
use yii\base\Widget;
use common\models\Menu;

class ChartBlock extends Widget
{
    public $strdate;
    public $enddate;
    public $upddate;

    public function run()
    {
        $strdate = date('Y.m.d', Reception::find()->orderBy('time')->one()->time);
        $enddate = date('Y.m.d');
        $upddate = date('Y.m.d');
        $egov = Menu::getModels(Menu::GOVERMENT, true);
        return $this->render('chartBlock',['strdate'=>$strdate, 'enddate'=>$enddate, 'upddate'=>$upddate,'egov'=>$egov]);
    }
}