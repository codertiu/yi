<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 5:56 PM
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

<div class="col-md-12">
    <div class="full-stry">
        <h1 class="allstoryhead"><?=$model->getLang('name')?></h1>
        <div class="th-story">
            <p>
            <h4><strong><?=Yii::t('main','Korxona rahbari: ')?></strong> <?=$model->getLang('leader')?></h4>
            <h4><strong><?=Yii::t('main','Adres')?> <?=$model->getLang('address')?></strong></h4>
            <h4><strong><?=Yii::t('main','Email')?></strong><?=$model->email?></h4>
            <h4><strong><?=Yii::t('main','Telefon: ')?></strong><?=$model->phone?></h4>
            </p>
            <p> <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?> </p>
            <?=\frontend\widgets\Files::widget(['section' => \common\models\Attach::POST, 'parent' => $model->id])?>
        </div>
        <div class="breadcrumb mt-5">
            <div class="col-md-6 dateanvi">
                <span><i class="fa fa-calendar"></i> <?=$model->created_date?> </span>
            </div>
            <div class="col-md-6 align-right">
                <a href="/post/print/<?=$model->id?>" target="_blank"><i class="fa fa-print"></i> <?=Yii::t('main','Распечатать')?></a>
            </div>
            <div class="clearfix clear"></div>
        </div>
    </div>
</div>