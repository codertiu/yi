<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:42 PM
 */

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="allheaders ">
                    <?= Yii::t('main','Вы')?>
                    <span><a href="/site/faq-view"><?=Yii::t('main','спрашивали')?></a></span>
                </h1>
                <div class="panel-group otapanel" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $i = 0; foreach($models as $podel) {
                        $model = \common\models\Faq::findOne($podel['id']);
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-<?=$i?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?=$i?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?=$model->getLang('question')?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse-<?=$i?>" class="panel-collapse collapse <?=$i==0 ? 'in' : ''?>" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <?= $model->getLang('anons')?> <a class="link" href="/site/faq-view/<?=$model->id?>"><?=Yii::t('main','Далее')?></a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; } ?>
                </div>
            </div>
            <div class="col-md-4 hidden-xs hidden-sm">
                <?= \frontend\widgets\Useful::widget(); ?>
            </div>
        </div>
    </div>
</section>
