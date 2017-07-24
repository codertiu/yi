<?php
use common\models\Menu;
?>
<section class="section-tabs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="draggable-container tab-navs">
                    <ul class="draggable draggable-center" role="tablist">
                        <li class="active">
                            <a href="#inteactive" data-toggle="tab"><?= Yii::t('main','Интерактивные услуги')?></a>
                        </li>
                        <li>
                            <a href="#e-gov" data-toggle="tab"><?= Yii::t('main','Электронное правительство')?></a>
                        </li>
                        <li>
                            <a href="#open-data" data-toggle="tab"><?= Yii::t('main','Откритые данные')?></a>
                        </li>
                        <li>
                            <a href="#stats" data-toggle="tab"><?= Yii::t('main','Статистика')?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="inteactive">
            <div class="tab-content-right-box"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tab-card-header"><?= Yii::t('main','Интерактивные услуги')?></div>
                    </div>
                    <?php
                        $services = Menu::find()->where(['status'=>1,'type'=>MENU::SERVICES])->orderBy(['order_by'=>SORT_ASC])->all();
                        foreach($services as $one) {
                    ?>
                    <div class="col-md-4">
                        <div class="tab-card"><a href="<?= $one->url ?>"><?= $one->title ?></a></div>
                    </div>
                    <?php }?>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="e-gov">
            <div class="tab-content-right-box" style="background: #2E406C"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tab-card-header"><?= Yii::t('main','Электронное правительство')?></div>
                    </div>
                    <?php
                    $goverment = Menu::find()->where(['status'=>1,'type'=>MENU::GOVERMENT])->orderBy(['order_by'=>SORT_ASC])->all();
                    foreach($goverment as $one) {
                        ?>
                        <div class="col-md-4">
                            <div class="tab-card"><a href="<?= $one->url ?>"><?= $one->title ?></a></div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
        <div class="tab-pane" id="stats">
            <div class="tab-content-right-box" style="background: #9CEEC8"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tab-card-header"><?= Yii::t('main','Статистика и отчеты')?></div>
                       <?
                            $count = \common\models\CountArt::findOne(1);
                       ?>
                        <ul class="stats-list">
                            <li class="stats-header"><?= Yii::t('mian','Обшее количество')?></li>
                            <li><?= Yii::t('main','Театров')?> - <?= $count->theaters ?></li>
                            <li><?= Yii::t('main','Музеев')?> - <?= $count->museums ?></li>
                            <li><?= Yii::t('main','Клубов')?> - <?= $count->clubs ?></li>
                            <li><?= Yii::t('main','Парков')?> - <?= $count->parks ?></li>
                            <li><?= Yii::t('main','Культурных наследий')?> - <?= $count->cultural ?></li>

                            <li class="stats-header"><?= Yii::t('main','Другие направлении')?></li>
                            <li><?= Yii::t('main','Лицензированные')?> - <?= $count->licensed ?></li>
                            <li><?= Yii::t('main','Количество экспонатов')?> - <?= $count->exhibits ?></li>
                            <li><?= Yii::t('main','Актеры')?> - <?= $count->actors ?></li>
                            <li><?= Yii::t('main','Вакансии')?> - <?= $count->careers ?></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-card-header stats-main-primary-header">Статистика по обращениям граждан</div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="stats-main-subheader">Информация о звонков поступивших по телефону доверия за период с 2016.04.21 по 2017.03.15</div>
                                <div class="round-count">
                                    <div class="round">9100</div>
                                    <span>Поступившиз обращений</span>
                                </div>

                                <div class="line-stats-box">
                                    <div class="line-stats">
                                        <span>От физических лиц: 0 / 0%</span>
                                        <div class="line line1" style="width: 80%"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>От юридических лиц: 0 / 0%</span>
                                        <div class="line line2"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>Необработанные: 0 / 0%</span>
                                        <div class="line line3"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>В обработке: 0 / 0%</span>
                                        <div class="line line4"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>Завершенние: 0 / 0%</span>
                                        <div class="line line5"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-main-subheader">Статистика обращений с виртуального приемного министра за период с 2016.04.21 по 2017.03.15</div>
                                <div class="round-count">
                                    <div class="round">9100</div>
                                    <span>Поступившиз обращений</span>
                                </div>

                                <div class="line-stats-box">
                                    <div class="line-stats">
                                        <span>От физических лиц: 0 / 0%</span>
                                        <div class="line line1"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>От юридических лиц: 0 / 0%</span>
                                        <div class="line line2"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>Необработанные: 0 / 0%</span>
                                        <div class="line line3"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>В обработке: 0 / 0%</span>
                                        <div class="line line4"></div>
                                    </div>
                                    <div class="line-stats">
                                        <span>Завершенние: 0 / 0%</span>
                                        <div class="line line5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="open-data">
            <div class="tab-content-right-box" style="background: #2E406C"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="tab-card-header"><?= Yii::t('main','Откритые данные')?></div>
                    </div>
                    <?php
                    $open_data = Menu::find()->where(['status'=>1,'type'=>MENU::OPEN_DATA])->orderBy(['order_by'=>SORT_ASC])->all();
                    foreach($open_data as $one) {
                        ?>
                        <div class="col-md-4">
                            <div class="tab-card"><a href="<?= $one->url ?>"><?= $one->title ?></a></div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>