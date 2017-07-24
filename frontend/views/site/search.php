<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \common\models\SearchForm $model */
/** @var boolean $formSubmitted */
/** @var \common\models\Post[] $results */

if($formSubmitted && $model->text){
    $this->title = 'Showing results for ' . $model->text;
} else {
    $this->title = 'Sayt bo`ylab izlash';
}
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="section-breadcrumb">
                    <?=
                    \yii\widgets\Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        //'options' => ['class' => 'breadcrumb hidden-xs']
                    ]) ?>
                </div>
                <div class="search-page">
                    <div class="section-single-title"><?= Yii::t('main','Результаты поиска')?></div>
                    <?php $form = ActiveForm::begin(['options'=>['class'=>'row form']]); ?>
                        <div class="col-md-12">
                            <?= $form->field($model, 'text')->textInput(['class'=>'form-control'])->label(false) ?>
                        </div>
                         <div class="col-md-12">
                             <?= Html::submitButton(Yii::t('main',Yii::t('main','Поиск')), ['id'=>'but','class' => 'btn btn-primary']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                    <div class="posts">
                        <?php
                        if($formSubmitted){
                            ?>
                            Showing results for <b><?= $model->text ?></b>
                            <?php
                            foreach ($results as $result) {
                                $dir = realpath(dirname(__FILE__)).'/../../../'.Yii::$app->params['images_dir'].'square/';
                                $image = $result->main_image && file_exists($dir.$result->main_image) ? Yii::$app->params['images_path'].'square/' . $result->main_image : Yii::$app->params['default_post_image'];
                                ?>
                                <div class="post-item">
                                    <div class="post-img">
                                        <a href="/post/view/<?=$result->id?>">
                                            <img src="<?=$image?>" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-title">
                                            <a href="/post/view/<?=$result->id?>"><?=$result->title?></a>
                                        </div>
                                        <div class="post-desc"><?=$result->anons?></div>
                                        <div class="post-footer">
                                            <div class="post-date"><i class="fa fa-clock-o"></i> <?= date('d.m.Y',strtotime($result->created_date))?></div>
                                            <a href="/post/view/<?=$result->id?>"><?= Yii::t('main','Подробнее')?></a>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>
