<?php

use kartik\switchinput\SwitchInput;
use kato\DropZone;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?> 

<?php $form = ActiveForm::begin([
    'id' => 'create-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <?= $form->field($model, 'language_id')->hiddenInput()->label(false) ?>

                <?= $form->field($model, 'level_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'reception_days')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'blog')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'biography')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'image')->hiddenInput(['id' => 'admission-image-input']) ?>

                <?= DropZone::widget([
                    'uploadUrl' => '/admission/upload',
                    'options' => ['maxFilesize' => '2', 'maxFiles' => '1',],
                    'clientEvents' => [
                        'success' => "function(file,r){console.log(r.name);document.getElementById('admission-image-input').value=r.name;}",
                        'maxfilesexceeded' => "function(file){this.removeAllFiles(); this.addFile(file);}",
                        'removedfile' => "function(file){console.log(file.name + ' is removed')}"
                    ],
                ]) ?>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="panel panel-default">

            <div class="panel-body">

                <?= $form->field($model, 'order_by')->textInput() ?>

                <?php

                if($model->isNewRecord){

                    $model->status = true;

                }

                ?>

                <?= $form->field($model, 'status',
                    ['options' =>
                        ['class' => 'form-group form-group-default input-group'],
                        'template' => '<label class="inline" for="admissionform-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
                        'labelOptions' => ['class' => 'inline']
                    ])->checkbox([
                    'data-init-plugin' => 'switchery',
                    'data-color' => 'primary'
                ], false);
                ?>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>