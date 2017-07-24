<?php
use common\models\Menu;
?>
<footer>

    <div class="main-footer">
        <div class="container">
            <div class="footer-info-box">
                <div class="row no-gutter">
                    <div class="col-md-5">
                        <div class="footer-info-container">
                            <div class="logo">
                                <div class="logo-img">
                                    <img src="/img/logo.png" alt="">
                                </div>
                                <div class="logo-text">
                                    <h1><?= Yii::t('main','Мининстерство культуры')?></h1>
                                    <h2><?= Yii::t('main','Республики Узбекистан') ?></h2>
                                    <p><?= Yii::t('main','Официальный веб сайт')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-hosts-info">
                            <ul>
                                <li><?= Yii::t('main','Счетчик посещаемости') ?></li>
                                <li><?= Yii::t('main','Онлайн .................') ?> <?=Yii::$app->userCounter->getOnline()?></li>
                                <li><?= Yii::t('main','Хосты сегодня ....') ?> <?=Yii::$app->userCounter->getToday()?></li>
                                <li><?= Yii::t('main','Хосты всего .........') ?> <?=Yii::$app->userCounter->getTotal()?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-social-info">
                            <ul>
                                <li>
                                    <a href="<?=\common\models\Settings::findOne('twitter')->val?>"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="<?=\common\models\Settings::findOne('facebook')->val?>"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="<?=\common\models\Settings::findOne('skype')->val?>"><i class="fa fa-paper-plane"></i></a>
                                </li>
                                <li>
                                    <a href="<?=\common\models\Settings::findOne('youtube')->val?>"><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-links-box">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-link-header"><?= Yii::t('main', 'Карта сайта');?></div>
                        <ul>
                            <?php $footer = Menu::find()->where(['status'=>1, 'type'=>Menu::FOOTER])->orderBy(['order_by'=>SORT_ASC])->all();
                            foreach($footer as $foot){
                            ?>
                            <li>
                                <a href="<?= $foot->url?>"><?= $foot->title ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-link-header"><?= Yii::t('main','Деятельность')?></div>
                        <ul>
                            <?php $footer = Menu::find()->where(['status'=>1, 'type'=>Menu::FOOTER2])->orderBy(['order_by'=>SORT_ASC])->all();
                            foreach($footer as $foot){
                                ?>
                                <li>
                                    <a href="<?= $foot->url?>"><?= $foot->title ?></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-link-header"><?= Yii::t('main','Учреждение')?></div>
                        <ul>
                            <?php $footer = Menu::find()->where(['status'=>1, 'type'=>Menu::FOOTER3])->orderBy(['order_by'=>SORT_ASC])->all();
                            foreach($footer as $foot){
                                ?>
                                <li>
                                    <a href="<?= $foot->url?>"><?= $foot->title ?></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-link-header"><?= Yii::t('main','Контакты')?></div>
                        <div class="footer-address"><?=\common\models\Settings::findOne('address')->val?></div>
                        <div class="footer-call-center">
                            <h3><?= Yii::t('main','Единий котакт-центр')?></h3>
                            <h4><?= substr(\common\models\Settings::findOne('phone1')->val,0,7)?><span><?= substr(\common\models\Settings::findOne('phone1')->val,7)?></span></h4>
                            <h4>
                                <i class="fa fa-envelope-o"></i>
                                <a href="#"><?=\common\models\Settings::findOne('email')->val?></a> |
                                <a href="#"><?=\common\models\Settings::findOne('email2')->val?></a>
                            </h4>
                            <h5><?= Yii::t('main', 'Нашли ошибку в тексте? Выделите мышкой и нажмите CTRL + ENTER')?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-copyright-rule">
                            <?= Yii::t('main','При полном или частичном использовании и цитировании материалов, опубликованных на данном сайте, ссылка на офицалбный сайт Министерство по делам культуры mcs.uz')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-overlay"></div>
    <div class="footer-copyright-box">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="footer-copyright-text">
                        2005-<?=date("Y");?> <?= \common\models\Settings::findOne('copyright')->val;?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-copyright-img">
                        <img src="/img/oksuz.png" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>