<?php
use common\models\Settings;
use common\models\SearchForm;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$js = <<<JS
    $('.selectOption').on('click',function(){
        window.location.href='/site/lang?lang=' + $(this).attr('data-value');
    });

$(function () {
  $('[data-toggle="popover"]').popover({ trigger: "hover" })
})

JS;
$mlogo = \common\models\Settings::findOne('mobile_logo')->getLang();
$css = <<<CSS
@media only screen and (max-width: 767px) {
.mobile-logo {
background: url("/images/original/$mlogo") no-repeat center top !important;
}
}
CSS;
$this->registerCss($css);
$this->registerJs($js,\yii\web\View::POS_READY);
$tel1 = Settings::findOne('phone1')->val;
$tel2 = Settings::findOne('phone2')->val;
$ishonch_tel = Yii::t('main','Ishonch telefonlari');
$sweetm_js = <<<JS
$('.telph').on('click', function(){
$.sweetModal({
	title: '$ishonch_tel',
	content: '<p>$tel1</p><p>$tel2</p>'
});

});
JS;


$this->registerJs($sweetm_js);

?>
<div class="main_header type2">
    <div class="warhedbg">
        <div class="seconbgs">
            <div class="centerbg">
                <div class="mobile-logo">
                    <div class="tagline">
                        <div class="container">
                            <div class="fright">
                                <div class="tagline_items">
                                    <ul class="thetopmenu">
                                        <li class="hidden-xs" style="margin-right: 10px">
                                            <?= \common\components\StaticFunctions::getDate(false,true) ?>
                                        </li>
                                        <li>
                                            <div class="language_select">
                                                <div class="selectBox">
                                                    <span class="selected"></span>
                                                    <span class="selectArrow"></span>
                                                    <div class="selectOptions">
                                                        <?php
                                                        $langs = \common\components\StaticFunctions::getLangs();
                                                        foreach ($langs as $lang){
                                                            echo '<span class="selectOption" data-value="'. $lang['abb']. '">';
                                                            echo ''.$lang['name'].'</span>';
                                                        }
                                                        ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="log_in_out2">
                                                <div class="dropdown">

                                                    <div class="icon_accessibility dataTooltip" data-toggle="dropdown" data-placement="bottom" title="" data-original-title="<?= Yii::t('main', 'Махсус имкониятлар')?>" aria-expanded="true"><a href="#" class="fa fa-eye "> </a></div>

                                                    <div class="dropdown-menu dropdown-menu-right specialViewArea no-propagation">
                                                        <div class="triangle"></div>

                                                        <div class="appearance">
                                                            <p class="specialTitle"><?= Yii::t('main', 'Кўриниш')?></p>

                                                            <div class="squareAppearances">
                                                                <div class="squareBox spcNormal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= Yii::t('main', 'Оддий кўриниш')?>">A</div>
                                                            </div>
                                                            <div class="squareAppearances">
                                                                <div class="squareBox spcWhiteAndBlack" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= Yii::t('main', 'Оқ-қора кўриниш')?>">A</div>
                                                            </div>
                                                            <div class="squareAppearances">
                                                                <div class="squareBox spcDark" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= Yii::t('main', 'Қоронғилашган кўриниш')?>">A</div>
                                                            </div>
                                                            <div class="squareAppearances">
                                                                <div class="squareBox spcNoImage" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= Yii::t('main', 'Расмли')?>"></div>
                                                            </div>
                                                        </div>

                                                        <div class="appearance">
                                                            <p class="specialTitle"><?= Yii::t('main', 'Шрифт ўлчами')?></p>

                                                            <div class="block">
                                                                <div class="sliderText"><span class="range">0</span>% <?= Yii::t('main','га катталаштириш') ?></div>
                                                                <div id="fontSizer" class="defaultSlider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                    <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="more_margin"></div>

                                                        <div class="appearance">
                                                            <div class="pull-right">
                                                                <p id="narratorHelp" class="rounded pointer" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= Yii::t('main','Ёрдам')?> ">?</p>
                                                            </div>
                                                            <p class="specialTitle"><?= Yii::t('main','Экран сухандони') ?></p>
                                                            <label for="speechSwitcher"><a href="/site/voice"><span></span><?= $speech ?></a></label>
                                                        </div>

                                                        <div class="more_margin"></div>

                                                        <div class="appearance">
                                                            <div class="specialViewCopyrightText">

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="email">
                                                <a href="/post/view/106"><?= Yii::t('main','Государственные символы')?></a>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                            <div class="fleft">
                                <ul class="thetopmenu">
                                    <li><div class="phone"><i class="icon-phone"></i><?= \common\models\Settings::findOne('phone1')->val?></div></li>
                                    <li><div class="email"><a href="mailto:<?= \common\models\Settings::findOne('email')->val?>"><i class="icon-envelope-o"></i><?= \common\models\Settings::findOne('email')->val?></a></div></li>
                                    <li>

                                        <div class="dropdown">
                                            <div class="log_in_out2">
                                                <div class="icon_accessibility dataTooltip" data-toggle="dropdown" data-placement="bottom" title="" data-original-title="Search" aria-expanded="true"><a href="#" class="fa fa-search "></a></div>

                                                <div class="dropdown-menu dropdown-menu-right no-propagation">
                                                    <div class="seach">
                                                        <?php
                                                        $searchModel = new SearchForm();
                                                        $form = ActiveForm::begin(['action'=>'/site/search','options'=>['class'=>'form']]);
                                                        ?>

                                                        <?= $form->field($searchModel, 'text') ?>
                                                        <?= Html::submitButton(Yii::t('main','Search'), ['class' => 'btn btn-primary']) ?>

                                                        <?php ActiveForm::end(); ?>
                                                    </div><!-- /.col-lg-6 -->

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="container hidden-xs">
                            <a class="log-main" href="/site/index">
                                <img src="/images/original/<?= \common\models\Settings::findOne('logo')->getLang();?>" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="container-floating">


    <a href="/post/view/59">
        <div class="nd5 nds" data-container="body" data-toggle="popover" data-placement="left" data-content="Biz bilan bog`lanish"><img class="reminder">
            <p class="letter"><i class="fa fa-map-marker"></i> </p>
        </div>
    </a>
    <a href="/site/faq-view/">
        <div class="nd4 nds" data-container="body" data-toggle="popover" data-placement="left" data-content="Savol va javoblar"><img class="reminder">
            <p class="letter"><i class="fa fa-question"></i> </p>
        </div>
    </a>
    <a href="/services/virtual-reception">
        <div class="nd3 nds" data-container="body" data-toggle="popover" data-placement="left" data-content="Virtual qabulxona"><img class="reminder">
            <p class="letter"><i class="fa fa-envelope-o"></i> </p>
        </div>
    </a>
    <a class="telph">
        <div class="nd1 nds" data-container="body" data-toggle="popover" data-placement="left" data-content="Ishonch telefonlari"><img class="reminder">
            <p class="letter"><i class="fa fa-phone"></i> </p>
        </div>
    </a>

    <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
        <p class="plus"><i class="fa fa-tree faa-float animated"></i></p>
        <img class="edit" src="/img/bt_compose2_1x.png">
    </div>

</div>