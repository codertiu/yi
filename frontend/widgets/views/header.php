<?php

?>
<header>
    <div class="container">
        <div class="row no-gutter">
            <div class="col-md-4">
                <ul class="left-col">
                    <li onclick="popupWindow(window.location.href, '', 500, 700)">
                        <a href="#"><i class="fa fa-mobile"></i> <?= Yii::t('main','Мобильная версия') ?></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-clock-o"></i> <?= \common\components\StaticFunctions::getDate(false,true) ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <ul class="right-col">
                    <li>
                        <a href="/site/map" class="hb"><i class="fa fa-sitemap"></i><?= Yii::t('main','Карта сайта') ?></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-forumbee"></i> <?= Yii::t('main','Форум') ?></a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['/post/view', 'id'=> 30])?>"><?= Yii::t('main','Государственные символы') ?></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-envelope-o"></i> <?= Yii::t('main','Почта') ?></a>
                    </li>
                    <li class="lang">
                        <div class="language_select">
                            <div class="selectBox">

                                <span class="selected"></span>
                                <span class="selectArrow"></span>
                                <div class="selectOptions">
                                    <?php foreach($langs as $lang) { ?>
                                    <span class="selectOption" data-value="<?=$lang['abb']?>"><?=$lang['name']?></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="specialView">
                        <div class="dropdown">
                            <div data-toggle="dropdown" aria-expanded="true">
                                <a href="#" class="fa fa-eye "></a>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right specialViewArea no-propagation">
                                <div class="triangle"></div>
                                <div class="appearance">
                                    <p class="specialTitle"><?= Yii::t('main','Кўриниш') ?></p>
                                    <div class="squareAppearances">
                                        <div class="squareBox spcNormal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Оддий кўриниш">A</div>
                                    </div>
                                    <div class="squareAppearances">
                                        <div class="squareBox spcWhiteAndBlack" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Оқ-қора кўриниш">A</div>
                                    </div>
                                    <div class="squareAppearances">
                                        <div class="squareBox spcDark" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Қоронғилашган кўриниш">A</div>
                                    </div>
                                    <div class="squareAppearances">
                                        <div class="squareBox spcNoImage" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Расмли"></div>
                                    </div>
                                </div>
                                <div class="appearance">
                                    <p class="specialTitle"><?= Yii::t('main','Шрифт ўлчами') ?></p>
                                    <div class="block">
                                        <div class="sliderText"><span class="range">0</span>% <?= Yii::t('main','га катталаштириш') ?></div>
                                        <div id="fontSizer" class="defaultSlider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
                                            <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div></div>
                                    </div>
                                </div>
                                <div class="more_margin"></div>
                                <div class="appearance">
                                    <div class="pull-right">
                                        <p id="narratorHelp" class="rounded pointer" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Ёрдам">?</p>
                                    </div>
                                    <p class="specialTitle"><?= Yii::t('main','Экран сухандони') ?></p>
                                    <a href="/site/voice"><?= $speech ?></a>
                                </div>
                                <div class="more_margin"></div>
                                <div class="appearance">
                                    <div class="specialViewCopyrightText">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-primary-bg"></div>
</header>