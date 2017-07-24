<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 12/16/16
 * Time: 5:06 PM
 */
/** @var \common\models\Polls $model */
/** @var integer $voted */

$js = <<<JS
var rswaitingstate = true;
$('#vote-select-button').click(function(e) {
    if(rswaitingstate){
        var uid = $('input[name="voteOptionsRadios"]:checked').val();
        e.preventDefault();
        if (uid !== undefined){
            rswaitingstate = !rswaitingstate;
            $('#vote-select-button').addClass('m-progress');
            var data = {
                id: uid
            };
            $.ajax({
                type: "POST",
                url: '/site/vote/' + uid,
                success: function(data) {
                    if (data.success){
                        $('#total-vote-count').html(data.total);
                        $('[data-checkedicon]').addClass('hidden');
                        $('[data-checkedicon="'+data.selected+'"]').removeClass('hidden');
                        $.each(data.data , function (index, value){
                            $('[data-optioncountid="'+value.id+'"]').html(value.count);
                        });
                        $('#reception-status-result').html('');
                    } else {
                        $('#reception-status-result').html('Unknown error.');
                    }
                    rswaitingstate = !rswaitingstate;
                    $('#vote-select-button').removeClass('m-progress');
                },
                error: function() {
                    rswaitingstate = !rswaitingstate;
                    $('#vote-select-button').removeClass('m-progress');
                    $('#reception-status-result').html('Server bilan bog`lanishda xatolik.');
                }
            });
        } else {
            $('#reception-status-result').html('Unknown error.');
        }
    }
});
JS;

$this->registerJs($js);

?>
<h5 style="margin-top: 30px !important;font-size: 20px;font-family: Lato, sans-serif;color: rgb(6, 139, 105);font-weight:bold;font-style: italic;margin-bottom: 0px!important;padding-bottom: 20px;"><?= $model->name ?> (<span id="total-vote-count"><?= $model->voteCount ?></span>)</h5>
<div style="background: #E8F2D6;padding:10px 18px 15px 18px;border-bottom: 2px solid #D2DEBB;border-radius: 5px;">
    <div class="col-md 12">
        <?php
        foreach ($model->options as $option) {
            ?>
            <div class="radio mt-1">
                <label for="pollOptionsRadios<?= $option->id ?>">
                    <input type="radio" name="voteOptionsRadios" id="pollOptionsRadios<?= $option->id ?>" value="<?= $option->id ?>"<?= $voted == $option->id ? ' checked' : '' ?>>
                    <?= $option->name ?> / <span data-optioncountid="<?= $option->id ?>"><?= $option->count ?></span>
                </label> <?= $voted == $option->id ? '<i class="glyphicon glyphicon-ok" data-checkedicon="'.$option->id.'" style="color: #26C27A;"></i>' : '<i class="hidden glyphicon glyphicon-ok" data-checkedicon="'.$option->id.'" style="color: #26C27A;"></i>' ?>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="mt-1">
        <button class="btn-primary btn btn-block" id="vote-select-button" style="background-color: rgb(6, 139, 105);"><?= $voted ? Yii::t('main','Изменить') : Yii::t('main','Голосовать') ?></button>
    </div>
    <div id="reception-status-result"></div>
</div>
