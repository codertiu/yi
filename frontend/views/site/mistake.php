<?php

use yii\widgets\ActiveForm;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <TITLE>Отправить ошибки</TITLE>
    <style type="text/css">
        body {
            margin: 23px 28px 0 28px;
            font-size:14px;
            font-family:Helvetica, Sans-serif, Arial;
            line-height:2em;
        }
        form {margin: 0;}
        .text {
            font-weight: bold;
            font-size:12px;
            color:#777;
        }
        .copyright {
            font-size:11px;
            color:#777;
        }
        .mclose a{
            font:bold 16px Verdana;
            color:#7f7f7f;
            position:absolute;
            right:12px;
            top:9px;
            display:block;
            text-decoration:none;
        }
        .mclose a:hover{
            color: #000;
        }
        #m{
            border: 1px solid silver;
            padding: 3px;
            width: 294px;
            border-radius:4px;
            font-size: 13px;
            background-color: #fff;
        }
        #m strong{
            color:red;
        }
    </style>

    <script language="JavaScript">
        var p=top;
        function readtxt()
        { if(p!=null)document.forms.mistake.url.value=p.loc
            if(p!=null)document.forms.mistake.mis.value=p.mis
        }
        function hide()
        { var win=p.document.getElementById('mistake');
            win.parentNode.removeChild(win);
        }
    </script>

</head>
<body onload=readtxt()>
<div class="mclose"><a href="javascript:void(0)" onclick="hide()" title="Отменить">&times;</a></div>
<span class="text">
Сайт :
 </span>
<br />
<?php ActiveForm::begin() ?>
    <input id="m" type="text" name="url" size="35" readonly="readonly" value="<?=$id?>">
        <span class="text"><?=Yii::t('main','Ошибка :')?></span><br/>
        <input type="hidden" name="mistake" id="mistake-input">
    <div id="m" style="line-height:normal;height: 75px;width: 287px;">
        <script language="JavaScript">
            document.write(p.mis);
            document.getElementById('mistake-input').value = p.mis;
        </script>
    </div>

        <span class="text"><?=Yii::t('main','Комментария: ')?></span>
    <br/>
    <textarea id="m" rows="5" name="comment" cols="30"></textarea>
    <div style="margin-top: 7px"><input type="submit" value="Отправит" name="submit">
        <input onclick="hide()" type="button" value="Закрыт" id="close" name="close">
    </div>
<?php ActiveForm::end() ?>

</body></html>
