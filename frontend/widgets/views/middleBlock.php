<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:05 PM
 */

use common\models\Reception;
use common\models\Settings;
use frontend\widgets\ReceptionStatistic;

?>

<div class="tabsback hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs --><div class="cardhello">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active col-md-3 "><a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                <i class="demo-icon fontsize01 bc-center icon-manager"></i>
                                <span class="bc-center"><?= Yii::t('main','Интерактивные услуги') ?></span>
                            </a></li>
                        <li role="presentation" class="col-md-3"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                <i class="demo-icon icon-city-hall fontsize01 bc-center"></i>
                                <span class="bc-center"><?= Yii::t('main','Электронная правительство') ?></span>
                            </a></li>
                        <li role="presentation" class="col-md-3"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                                <i class="demo-icon fontsize01 bc-center icon-inbox"></i>
                                <span class="bc-center"><?= Yii::t('main','Открытые данные') ?></span>
                            </a></li>
                        <li role="presentation" class="col-md-3"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">

                                <i class="demo-icon fontsize01 icon-newspaper bc-center"></i>
                                <span class="bc-center"><?= Yii::t('main','Статистика и отчеты') ?></span>
                            </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active fade in" id="home">
                            <div class="tabcontheaders">
                                <?php foreach($models1 as $model) { ?>
                                    <div class="col-md-3 col-sm-4">
                                        <a href="<?=$model->url?>">
                                            <div class="extrabtn">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <div class="mediasotne">
                                                            <i class="<?=$model->icon?>"><?=$model->icon2?></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body media-middle">
                                                        <h4 class="media-heading"><?=$model->title?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div class="tabcontheaders">
                                <?php foreach($models2 as $model) { ?>
                                    <div class="col-md-3 col-sm-4">
                                        <a href="<?=$model->url?>">
                                            <div class="extrabtn">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <div class="mediasotne">
                                                            <i class="<?=$model->icon?>"><?=$model->icon2?></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body media-middle">
                                                        <h4 class="media-heading"><?= $model->title ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <div class="tabcontheaders">
                                <?php foreach($models3 as $model) { ?>
                                    <div class="col-md-3 col-sm-4">
                                        <a href="<?=$model->url?>">
                                            <div class="extrabtn">
                                                <div class="media">
                                                    <div class="media-left media-middle">
                                                        <div class="mediasotne">
                                                            <i class="<?=$model->icon?>"><?=$model->icon2?></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body media-middle">
                                                        <h4 class="media-heading"><?= $model->title ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="settings">
                            <div class="row">
                                <div class="col-md-6">
                                    <?= ReceptionStatistic::widget(['type' => 'manual']) ?>
                                </div>
                                <div class="col-md-6">
                                    <?= ReceptionStatistic::widget(['type' => 'site']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


