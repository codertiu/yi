<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/14/16
 * Time: 4:17 PM
 */

$js = <<<JS
    print();
JS;

$this->registerJs($js,\yii\web\View::POS_END);
?>
<style>
    .print-div {
        max-width: 1024px;
        margin: 0 auto;
        padding: 20px;
    }
    .print-div > h1 {
        text-align: center;
    }
    .print-div img {
        max-width: 300px;
        height: auto !important;
        clear: both !important;
        margin: 20px !important;
        float: left !important;
    }
</style>
<div class="col-lg-12">
    <div class="row print-div">
        <h1><?=$model->getLang('title')?></h1>
        <h4><?=date('d.m.Y',strtotime($model->created_date))?></h4>
        <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?>
        <?=\frontend\widgets\Files::widget(['section' => \common\models\Attach::POST, 'parent' => $model->id])?>
    </div>
</div>
