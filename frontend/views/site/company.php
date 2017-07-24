<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 4:08 PM
 */

$this->title = $model->getLang('name');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main','Холдинговые компании'), 'url' => '/site/companies'];
$this->params['breadcrumbs'][] = $this->title;

?>



<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="section-breadcrumb">
                    <?=
                    \yii\widgets\Breadcrumbs::widget([
                        'itemTemplate' => "<a>{link}</a> - ",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        //'options' => ['class' => 'breadcrumb hidden-xs']
                    ]) ?>
                </div>
                <div class="section-single-title"><?=$model->getLang('name')?></div>
                <div class="single-news-content-box">
                    <p>
                    <p><strong><?=Yii::t('main','Korxona rahbari: ')?>: </strong> <?=$model->getLang('leader')?></p>
                    <p><strong><?=Yii::t('main','Adres')?>:  <?=$model->getLang('address')?></strong></p>
                    <p><strong><?=Yii::t('main','Email')?>: </strong><?=$model->email?></p>
                    <p><strong><?=Yii::t('main','Telefon: ')?>: </strong><?=$model->phone?></p>
                    <p><strong><?=Yii::t('main','Fax: ')?> </strong><?=$model->fax?></p>
                    </p>
                    <p> <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?> </p>
                    <?=\frontend\widgets\Files::widget(['section' => \common\models\Attach::POST, 'parent' => $model->id])?>

                </div>
                <div class="single-news-footer">
                    <a href="/post/print/<?= $model->id?>"><div class="print"><i class="fa fa-print"></i> <?= Yii::t('main','Распечатать')?></div></a>
                    <div class="date"><?= date('d.m.Y',strtotime($model->created_date))?> <i class="fa fa-calendar"></i></div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>
