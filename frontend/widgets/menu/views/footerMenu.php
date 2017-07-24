<?php
$js = <<<JS
        $('#subs').on('keyup',function(e){
if(e.keyCode == 13) {
setemail();
}
});

$('#subs-btn').on('click',function(){
setemail();
});

function setemail() {
var email = $('#subs').val();
$('#subs').val('');
$.get(
'/site/add-email/',
{email : email},
function(data) {
var message = '';
switch (data) {
case 0: message = 'Не действительный адрес электронной почты'; break;
case 1: message = 'Ваша электронная почта успешно добавлено.'; break;
case 2: message = 'Это почта уже подписано.'; break;
default : message = 'Ошибка при соединении.';
}
$('#message-subs').html(message);
$('#modal-open').click();
}
);
}
JS;

$this->registerJs($js,\yii\web\View::POS_READY);

?>
<button type="button" id="modal-open" class="hidden" data-toggle="modal" data-target="#myModal"></button>

<div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content" style="margin-top: 150px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"><?= Yii::t('main', 'Подписаться на новости')?></h4>
            </div>
            <div class="modal-body">
                <p id="message-subs"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= Yii::t('main', 'Закрыть')?></button>
            </div>
        </div>

    </div>
</div>


<div class="footer paralax">
    <div class="container">
        <div class="pre_footer">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidepanel widget_text">
                        <h4 class="title fz-20 widget_logo"><a href="/site/map/"><?= Yii::t('main', 'Карта сайта');?></a></h4>

                        <!--<p><?/*=\common\models\Settings::findOne('phone1')->val*/?></p>
                        <p><?/*=\common\models\Settings::findOne('phone2')->val*/?></p>-->
                        <p><?=\common\models\Settings::findOne('address')->val?></p>
                        <p>Email: <a href="mailto:#"><?=\common\models\Settings::findOne('email')->val?></a></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="sidepanel widget_posts ">
                        <h4 class="title"><?= Yii::t('main', 'Ссылки')?></h4>
                        <ul class="recent_posts colorse">

                            <? foreach ($models1 as $m){

                                echo '<li><a href="'.$m->url.'" class="">' . $m->getTitle() .'</a></li>';
                            }?>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="sidepanel widget_mailchimpsf_widget">
                        <h4 class="title"><?= Yii::t('main', 'Подписка на обновления')?></h4>
                        <div id="mc_signup">

                                <div id="mc_subheader"><?= Yii::t('main', 'Введите свой E-mail адрес и получайте новые материалы, новости и полезные советы с нашего сайта сразу на свою почту')?>:</div>
                                <div class="mc_form_inside">
                                    <div class="mc_merge_var">
                                        <label for="mc_mv_EMAIL" class="mc_var_label mc_header mc_header_email"><?= Yii::t('main', 'Ввведите элетронную почту')?></label>
                                        <input type="email" placeholder="<?= Yii::t('main','Введите элетронную почту') ?>" name="mc_mv_EMAIL" id="subs" class="mc_input"/>
                                    </div>
                                    <div class="mc_signup_submit">
                                        <input type="submit" name="mc_signup_submit" id="subs-btn" value="Go" class="button bt" />
                                    </div>
                                </div>

                        </div>
                        <div class="footer_socials">
                            <ul>
                                <li><a href="<?=\common\models\Settings::findOne('facebook')->val?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?=\common\models\Settings::findOne('twitter')->val?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?=\common\models\Settings::findOne('instagram')->val?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?=\common\models\Settings::findOne('skype')->val?>"><i class="fa  fa-send"></i></a></li>
                                <li><a href="<?=\common\models\Settings::findOne('youtube')->val?>"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                            <?=\frontend\widgets\ImagesWidget::widget()?>
                <div class="pre_footer22 hidden-xs">
                    <div class="col-md-4">
                        <div class="foot-w">
                            <?= \common\models\Settings::findOne('definition')->val?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="foot-w">
                            <ul>
                                <li><b><?= Yii::t('main','Счетчик посещаемости') ?></b></li>
                                <li><?= Yii::t('main','Онлайн .................') ?> <?=Yii::$app->userCounter->getOnline()?></li>
                                <li><?= Yii::t('main','Хосты сегодня ....') ?> <?=Yii::$app->userCounter->getToday()?></li>
                                <li><?= Yii::t('main','Хосты всего .........') ?> <?=Yii::$app->userCounter->getTotal()?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="foot-w">
                            <ul>
                                <li><b><?=Yii::t('main','Последнее обновление')?>:</b></li>
                                <li><?= date('d.m.Y | H:i',strtotime(\common\models\Post::find()->orderBy(['id' => SORT_DESC])->one()->created_date)) ?></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="foot-w">
                            <ul>
                                <li>
                                        <b>
<?= Yii::t('main', 'Нашли ошибку в тексте? Выделите мышкой и нажмите CTRL + ENTER')?>
                                        </b>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="footer_bottom">
            <div class="col-md-6">
                <div class="copyright">© 2011 – <?=date("Y");?> | <?= \common\models\Settings::findOne('copyright')->val;?></div>
            </div>
            <div class="col-md-6 counterts hidden-xs">
                <a href="http://oks.uz"><img class="pull-right" src="/img/oks.png" alt=""></a>
                <img class="pull-right" src="/img/cert.png" alt="">
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>