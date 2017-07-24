<?php

use common\models\Languages;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdmissionForm */
/** @var \common\models\Admission $adm */

$this->title = Yii::t('main', 'Update {modelClass}: ', [
    'modelClass' => 'Admission',
]) . $adm->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Admissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $adm->name, 'url' => ['view', 'id' => $adm->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update');
$langs = Languages::findAll(['status' => 1]);
$items = [];
?>
<!--<div class="admission-update">-->
<!--    <h3>--><?//= Html::encode($this->title) ?><!--</h3>-->
<!--    <div class="row">-->
<!--        <ul class="nav nav-tabs">-->
<!--        --><?php
//        foreach ($langs as $lang){
//            echo '<li role="presentation"'.($lang->id == $model->language_id ? ' class="active"' : '').'><a href="'.($lang->id == $model->language_id ? '#"' : \yii\helpers\Url::to(['/admission/update', 'id'=> $adm->id,'lang' => $lang->id])).'">' . $lang->name. ($lang->id == Yii::$app->lang->id ? ' (Asosiy)' : '') . '</a></li>';
//        }
//        ?>
<!--        </ul>-->
<!--    </div>-->
<!--    <br>-->
<!--    --><?//= $this->render('_form', [
//        'model' => $model,
//        'adm' => $adm,
//    ]) ?>
<!--</div>-->


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

                <div class="col-md-12">

                    <div class="panel panel-default">
                        <ul class="nav nav-tabs nav-tabs-simple hidden-xs" role="tablist" data-init-reponsive-tabs="collapse">
                                <?php

                                foreach($langs as $lang){

                                    ?>

                                    <li class="<?= $lang->id == $model->language_id ? ' class="active"' : '' ?>">
                                        <a href="<?=($lang->id == $model->language_id ? '#"' : \yii\helpers\Url::to(['/admission/update', 'id'=> $adm->id,'lang' => $lang->id]))?>"><?=$lang->name. ($lang->id == Yii::$app->lang->id ? ' (Asosiy)' : '')?></a>
                                    </li>

                                    <?php

                                }

                                ?>
                        </ul>

                    </div>

                </div>

                <div class="tab-content">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'adm' => $adm,
                    ]) ?>

                </div>

            </div>

        </div>
    </div>
</div>