<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('main', 'Upload Images');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$this->registerJs('$("[data-btn=upload]").on("click",function(e)
    {
        e.preventDefault(); 
        myDropzone.processQueue();  
    });
    
 ');

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?></h2>
                </div>
            </div>
        </div>

        <div class="panel-body no-padding row-default">

            <div class="row">

                <div class="col-md-8">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <?= \kato\DropZone::widget([
                                'options' => [
                                    'maxFilesize' => '2',
                                    'addRemoveLinks' => true,
                                    'autoProcessQueue'=> false,
                                    'autoDiscover' => false,
                                    'parallelUploads' => '10',
                                    'maxFiles' => '10',
                                    'uploadMultiple' => true,
                                    'acceptedFiles' => "image/*",
                                ],
                                'clientEvents' => [
                                    'successmultiple' => "function(){document.location.href = '/image/index'}",
                                    'sending' => 'function(file, xhr, formData){formData.append(\'album_id\', $("#album_id").children(":selected").attr("data-value"))}',
                                ],
                                'uploadUrl' => '/image/dropzone-upload/',
                            ]);
                            ?>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <div class="form-group field-menu-name required">
                                <label class="control-label" for="menu-name"><?= Yii::t('main', 'Album') ?></label>

                                <select id="album_id" class="full-width" data-init-plugin="select2"  style="margin-bottom: 15px;">

                                    <?

                                    $albums = \common\models\Album::find()->all();
                                    foreach ($albums as $album)
                                        echo '<option data-value = "'. $album->id . '" >'. $album->name. '</option>';
                                    ?>

                                </select>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-md-12">

<!--                    --><?//= Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

                    <button type="button" class="btn btn-primary" data-btn="upload"><?=Yii::t('main', 'Upload')?></button>

<!--                --><?php //ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>