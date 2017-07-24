<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 12/8/16
 * Time: 5:06 PM
 */
$radio = '<div class="radio">
  <label><input type="radio" name="optradio">Option 1</label>
  <label><input type="radio" name="optradio">Option 2</label>
  <label><input type="radio" name="optradio">Option 3</label>
</div>';
$js = <<<JS
var rswaitingstate = true;
$('#reception-status-id').keypress(function(e) {
    if (e.which == 13) {
        $('#reception-status-button').click();
        return false;
    }
});
$('#reception-status-button').click(function(e) {
    if(rswaitingstate){
        var uid = $('#reception-status-id').val();
        e.preventDefault();
        if (uid.length == 20){
            rswaitingstate = !rswaitingstate;
            $('#reception-status-button').addClass('m-progress');
            var data = {
                id: uid
            };
            $.ajax({
                type: "POST",
                url: '/site/reception-status',
                data: data,
                success: function(data) {
                    if (data.success){
                        if (data.done) {
                            $.sweetModal({
	title: 'Sizning murojaatingiz ko\'rib chiqildi',
	content: '<div class="radio"><label><input type="radio" name="optradio">Option 1</label><label><input type="radio" name="optradio">Option 2</label><label><input type="radio" name="optradio">Option 3</label></div>',
	showCloseButton: true,
	buttons: [
		{
		    action :function(sweetModal) {
		        console.log(sweetModal);
               // $.ajax({url: "/site/boho", success: function(result){
               //  alert(result);
               // }});
		    },
			label: 'OK',
			classes: 'greenB'
		}
	]
});
                        } else {                             
                            $('#reception-status-result').html(data.status);
                        }
                    }
                    rswaitingstate = !rswaitingstate;
                    $('#reception-status-button').removeClass('m-progress');
               },
                error: function() {
                    rswaitingstate = !rswaitingstate;
                    $('#reception-status-button').removeClass('m-progress');
                    $('#reception-status-result').html('Server bilan bog`lanishda xatolik.');
                }
            });
        } else {
            $('#reception-status-result').html('Id xato kiritildi.');
        }
    }
});
JS;

$this->registerJs($js);

?>

<h2><?= Yii::t('main','Cтатус обращения') ?></span></h2>
<div class="res-bg">
    <div class="col-md-12">
        <div class="form-group field-receptionform-firm_name">
            <label class="control-label" for="reception-status-id"><?= Yii::t('main','Ваш ID:') ?></label>
            <input type="text" id="reception-status-id" class="form-control" name="id">
            <div class="help-block"><small>(ex: 161221-585a3ac586182)</small></div>
        </div>
    </div>
    <div class="form-group col-md-12 text-center">
        <button type="button" class="btn btn-primary btn-block" id="reception-status-button"><?= Yii::t('main','Проверить') ?></button>
    </div>
    <div id="reception-status-result"></div>
    <div class="clearfix clear"></div>
</div>
