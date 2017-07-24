<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 5:06 PM
 */
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
                case 0: message = 'Не действительный адрес электронной почты.'; break;
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

<section class="hidden-xs">
    <div class="container">
        <div class="prettyinfo">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="anality">
                        <h5><?= Yii::t('main','Счетчик посещаемости') ?></h5>
                        <span><?= Yii::t('main','Онлайн .................') ?> <?=Yii::$app->userCounter->getOnline()?></span>
                        <span><?= Yii::t('main','Хосты сегодня ....') ?> <?=Yii::$app->userCounter->getToday()?></span>
                        <span><?= Yii::t('main','Хосты всего .........') ?> <?=Yii::$app->userCounter->getTotal()?></span>

                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="ctrlplus">
                        <span><?= Yii::t('main','Нашли ошибку в тексте? Выделите мышкой и нажмите CTRL + ENTER') ?></span>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm podpiska">
                    <h5><?= Yii::t('main','Подписка на новости') ?></h5>
                    <div class="subc">
                        <input type="email" class="form-control" id="subs" placeholder="<?= Yii::t('main','Email...') ?>">
                        <button id="subs-btn" class="btn btn-success roun-max" type="button"><i class="fa fa-send"></i></button>
                    </div><!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
</section>


    <button type="button" id="modal-open" class="hidden" data-toggle="modal" data-target="#myModal"></button>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?=Yii::t('main','Подписаться на новостей')?></h4>
                </div>
                <div class="modal-body">
                    <p id="message-subs"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=Yii::t('main','Закрыт')?></button>
                </div>
            </div>

        </div>
    </div>



