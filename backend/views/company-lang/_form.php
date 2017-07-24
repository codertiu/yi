<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'action' => $action,
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'lang', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'parent', ['options' => ['class' => 'form-group invisible']])->textInput(['class' => 'hidden'])->label(false) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'anons')->textarea(['rows' => 4]) ?>

            <?= $form->field($model, 'body')->label( Yii::t('main', 'Content') )->textarea(['id' => 'companylang-body-'.$model->lang]); ?>

        </div>

    </div>

</div>

<div class="col-md-4">

    <div class="panel panel-default">
        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Icon') ?></div>
        </div>
        <div class="panel-body">
            <?php
            if($model->icon && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->icon )) {
                ?>

                <img class="image_preview postImage" data-title="<?=$model->name ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/l_' . $model->icon ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->parent . '/m_' . $model->icon ?>"/>


                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'icon', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['id' => 'categorylang-image' . $id, 'class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
        </div>
    </div>

    <div class="panel panel-default">

        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Settings') ?></div>
        </div>

        <div class="panel-body w-pad">

            <?= $form->field($model, 'leader')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        </div>

    </div>

</div>

<div class="col-md-12">

    <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'companylang-body-<?=$model->lang?>', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>

