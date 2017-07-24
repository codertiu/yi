<?php
use okeanos\chartist\Chartist;
use yii\helpers\Json;
use yii\web\JsExpression;
use common\models\Reception;
?>



<div class="row" id="chart">
    <div class="col-sm-12 module_cont pb40 module_tabs">
        <div class="shortcode_tabs type3" id="gabwba">
            <div class="all_head_sizer"><div class="all_heads_cont"></div><div class="clear"></div></div>
            <div class="all_body_sizer"><div class="all_body_cont" style="padding-top:40px;"></div></div>
            <div class="shortcode_tab_item_title expand_no"><?= Yii::t('main', 'Виды деревьев')?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <?= \frontend\widgets\BarChart::widget();?>
                    </div>
                </div>
            </div>
            <div class="shortcode_tab_item_title expand_no"><?= Yii::t('main', 'Динамика')?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="row">
                            <?= \frontend\widgets\DinamikaWidget::widget()?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shortcode_tab_item_title expand_no"><?= Yii::t('main', 'Эл-правительство')?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="row" style="padding-bottom: 2em;">
                            <? foreach ($egov as $e){?>
                                <div class="col-md-3 mb-5">
                                    <div class="module_content shortcode_iconbox type1">
                                        <div class="iconbox_wrapper">
                                            <div class="icon_title_wrap">
                                                <a  href="<?=$e->url?>">
                                                    <div class="ico faa-parent animated-hover">
                                                        <i style="line-height:80px!important;color:white;margin-left: 3px;font-size: 40px;" class="fa  <?=$e->icon?> fa-3 faa-horizontal"><?=$e->icon2?></i>
                                                    </div>
                                                    <h5 class="iconbox_title"><?= $e->title?></h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shortcode_tab_item_title expand_yes"><?= Yii::t('main', 'Статистика и отчеты')?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="row">
                            <div class="col-sm-12 module_cont pb5">
                                <div class="module_descr">
                                    <p><?= Yii::t('main', 'Статистика обращений с сайта')?> <?=Yii::t('main','за период с {strdate}  по {enddate} <b>информация обновлено {upddate}</b>', ['strdate'=>$strdate, 'enddate'=>$enddate, 'upddate'=>$upddate])?>
                                </div>
                                <div class="col-lg-4">
                                    <div class="thenubmer5">
                                    <span class="center-block">
                                            <?= Reception::find()->count();?>
                                    </span>
                                        <p><?= Yii::t('main', 'Поступивших обращений')?></p>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <?= \frontend\widgets\PieChart::widget()?>
                                <div class="col-md-4">

                                <?= \frontend\widgets\Statistics::widget()?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 module_cont pb65">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>