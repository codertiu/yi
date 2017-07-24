<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'anons')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'answer')->textarea() ?>

        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'order_by')->textInput() ?>

            <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['faq_cat'],['class'=>'full-width', 'data-init-plugin' => 'select2', 'prompt' => Yii::t('main', 'Select Category')]) ?>

        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'faq-answer', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>