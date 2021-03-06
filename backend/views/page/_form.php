<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$js = <<<'JS'
    countInput = 0;
    var idInput = 1;
    $('#add-file').on('click', function(){
        if(countInput<30) {
        var obj = $('#files');
        var html = '<div class="col-md-12">\
            <div class="input-group">\
                <label class="input-group-btn">\
                <span class="btn btn-primary">\
                Browse&hellip; <input type="file" style="display: none;" name="file[]" id="file-' + idInput +'">\
                </span>\
                </label>\
                <input type="text" class="form-control" readonly>\
            </div>\
        </div>';
        obj.append(html);
        countInput ++;
        idInput ++;
        }
    });

    function removeClick(obj) {
        countInput--;
        var parent = obj.parent();
        parent.remove();
    }

  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        // label = input.val();
        label = input.val().replace('/\\/g', '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  $('body').on('fileselect', ':file', function(event, numFiles, label) {
      var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;

      if( input.length ) {
          input.val(log);
      } else {
          if( log ) alert(log);
      }

  });
JS;

$this->registerJs($js,\yii\web\View::POS_END);
?>

<style>
    .remove-btn {
        float: left;
        cursor: pointer;
        margin: 3px 10px;
    }
</style>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?php $form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'title')->label( Yii::t('main', 'Title') ) ?>

            <?= $form->field($model, 'second_title')->label( Yii::t('main', 'Subtitle') ) ?>

            <?= $form->field($model, 'body')->label( Yii::t('main', 'Content') )->textarea(); ?>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                Добавить файлы
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="row" id="files">
                                <div class="col-md-12">
                                    <h4>Добавить файлы</h4>
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                                <span class="btn btn-primary">
                                                    Browse&hellip; <input type="file" style="display: none;" name="file[0]" id="file-0" >
                                                </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <span class="help-block">
                                            Try selecting one or more files and watch the feedback
                                        </span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="button" style="padding: 5px 40px" class="btn btn-default btn-sm" id="add-file"> Add <span class="glyphicon glyphicon-plus"></span></button>
                                <br>
                                <br>
                            </div>

                            <?php
                            if(!$model->isNewRecord) {
                                echo \frontend\widgets\Files::widget(['section' => \common\models\Attach::POST, 'parent' => $model->id, 'admin' => true]);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Image') ?></div>
        </div>
        <div class="panel-body">
            <?php
            if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image )) {
                ?>

                <img class="image_preview postImage" data-title="<?=$model->title ?>" data-img="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->main_image ?>"src="<?= Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/m_' . $model->main_image ?>"/>

                <?php
            } else {
                ?>

                <img class="image_preview" src="<?= Yii::$app->params['frontend'] . '/images/default/m_post.jpg' ?>"/>

                <?php
            }
            ?>
            <?= $form->field($model, 'main_image', ['options' => ['class' => 'form-group fileinput-box']])->fileInput(['class' => 'fileinput'])->label(Yii::t('main', 'Upload')) ?>
        </div>
    </div>

    <div class="panel panel-default">

        <div class="panel-heading separator">
            <div class="panel-title"><?=Yii::t('main', 'Settings')?></div>
        </div>

        <div class="panel-body w-pad">

            <div class="form-group form-group-default input-group clipboard" data-clipboard-text="/<?=Yii::$app->controller->id?>/view/<?=$model->id?>"  >
                <label class="inline" for="post-link"><?=Yii::t('main', 'Link')?></label>
                <span class="input-group-addon" style="min-width: 150px;">
                    <input type="text" id="post-link" class="form-control" value="/<?=Yii::$app->controller->id?>/view/<?=$model->id?>">
                </span>
            </div>

            <?php

            if($model->isNewRecord){

                $model->status = true;

            }

            ?>

            <?= $form->field($model, 'status',
                ['options' =>
                    ['class' => 'form-group form-group-default input-group'],
                    'template' => '<label class="inline" for="page-status">' . Yii::t("main", "Status") . '</label><span class="input-group-addon bg-transparent">{input}</span>',
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

<script type="text/javascript">
    var editor = CKEDITOR.replace( 'page-body', {
        filebrowserBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=files',
        filebrowserImageBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=images',
        filebrowserFlashBrowseUrl : '/kcfinder/browse.php?opener=ckeditor&type=flash',
        filebrowserUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=files',
        filebrowserImageUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=images',
        filebrowserFlashUploadUrl : '/kcfinder/upload.php?opener=ckeditor&type=flash'
    });
    CKFinder.setupCKEditor( editor, '../' );
</script>
