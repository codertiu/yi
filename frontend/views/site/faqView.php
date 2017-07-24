<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/13/16
 * Time: 1:35 PM
 */
$this->title = 'faq view';
$this->params['breadcrumbs'][] = Yii::t('main', 'FAQ');

$models = $provider->getModels();
?>

<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="section-breadcrumb">
                    <?= \yii\widgets\Breadcrumbs::widget([
                        'itemTemplate' => "<a>{link}</a> - ",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </div>
                <div class="faq-page">
                    <div class="section-single-header">
                        <div class="section-single-title"><?= Yii::t('main','Вы')?><?=Yii::t('main','спрашивали')?></div>
                        <a data-modal="ContactModal" class="btn btn-success md-trigger">link</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php $i = 0; foreach($models as $podel) {
                                    $model = \common\models\Faq::findOne($podel['id']);
                                    if($i == 0){
                                        $show = "in";
                                        $expanded = "true";
                                    } else {
                                        $show = "";
                                        $expanded = "false";
                                    }


                                    ?>
                                    <div class="panel panel-default">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$i?>" aria-expanded="<?=$expanded?>" aria-controls="collapseOne">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <?= $model->getLang('anons')?>
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="collapse<?=$i?>" class="panel-collapse collapse <?=$show?>" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <?= \common\components\StaticFunctions::kcfinder($model->getLang('answer'))?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; } ?>
                                <?php echo \yii\widgets\LinkPager::widget([
                                    'pagination'=>$provider->pagination,
                                ]);
                                ?>
                            </div>
                        </div>
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