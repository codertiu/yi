<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 3:33 PM
 */

$this->title = Yii::t('main','Холдинговые компании');
$this->params['breadcrumbs'][] = $this->title;


$js =  <<<JS
    $('#region-btn').on( 'click', function(){
        var id = $('#region').val();
        window.location.href='/site/companies/' + id;
    });
JS;

$this->registerJs($js, \yii\web\View::POS_READY);

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
                <div class="company-page">
                    <div class="section-single-title"><?= Yii::t('main','Подведмственые организации')?></div>


                    <div class="form">
                        <div><?= Yii::t('main','Выберите область')?></div>
                        <select id="region" class="form-control">
                            <?php foreach(\common\models\Region::getLangModels() as $model) { ?>
                                <option value="<?=$model['id']?>" <?=$region == $model['id'] ? 'selected' : ''?>><?=$model['name']?></option>
                            <?php } ?>
                        </select>
                        <input type="button" class="btn btn-success" id="region-btn" value="<?=Yii::t('main','Искать')?>">
                    </div>

                    <div class="company">
                        <?php foreach($models as $podel) {
                            $model = \common\models\Company::findOne($podel['id']);
                            echo \frontend\widgets\CompanyPreview::widget(['model' => $model]);
                        } ?>

                    </div>

                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget() ?>
                <?= \frontend\widgets\Calendar::widget() ?>
            </div>
        </div>
    </div>
</section>