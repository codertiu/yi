<?php

$category = \common\models\PostCategory::findOne($model->category)->getLang('name');
$url = '/post/by-cat/'.$model->category;

if($model->category != 6)
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', $category), 'url' => [$url]];
$this->title = $model->getLang('title');
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
                <div class="section-single-title"><?=$model->getLang('title')?></div>
                <div class="single-news-content-box">
                    <p><?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?></p>
                    <?=\frontend\widgets\Files::widget(['section' => \common\models\Attach::POST, 'parent' => $model->id])?>
                </div>
                <div class="single-news-footer">
                    <a href="/post/print/<?= $model->id?>"><div class="print"><i class="fa fa-print"></i> <?= Yii::t('main','Распечатать')?></div></a>
                    <div class="date"><?= date('d.m.Y',strtotime($model->created_date))?> <i class="fa fa-calendar"></i></div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
            </div>
        </div>
    </div>
</section>