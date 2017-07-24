<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:41 PM
 */

namespace frontend\widgets;

use yii\base\Widget;
use Yii;
class Faq extends Widget {

    public $limit = false;

    public function run()
    {
        $limit = $this->limit === false ? Yii::$app->params['faq_limit'] : $this->limit;
        $where = \common\models\Faq::getWhere();
        $models = \common\models\Faq::find()->leftJoin('faq_lang', 'faq.id=faq_lang.parent')->where($where)->orderBy(['faq.id' => SORT_DESC])->limit($limit)->asArray()->all();
        return $this->render('faq', ['models' => $models]);
    }

}