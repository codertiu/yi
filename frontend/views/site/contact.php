<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
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
                <div class="contact-page">
                    <div class="section-single-title"><?= Yii::t('main','Контакты')?></div>
                    <div class="contact-info">
                        <div class="address"><span><?= Yii::t('main','Адрес')?>:</span> <?= \common\models\Settings::findOne('address')->getLang('val') ?></div>
                        <div class="phone"><span><?= Yii::t('main','Телефон')?>:</span> <?= \common\models\Settings::findOne('phone1')->val ?></div>
                        <div class="email"><span><?= Yii::t('main','Email:')?>:</span> <?= \common\models\Settings::findOne('email')->val ?></div>


                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label(Yii::t('main','name')) ?>

                        <?= $form->field($model, 'email')->label(Yii::t('main','email')) ?>

                        <?= $form->field($model, 'subject')->label(Yii::t('main','subject')) ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 6])->label(Yii::t('main','Body')) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('main','Отправить'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">

            </div>
        </div>
    </div>
</section>