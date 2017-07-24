<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<style>
    .mclose a{
        font:bold 16px Verdana;
        color:#7f7f7f;
        position:absolute;
        right:12px;
        top:9px;
        display:block;
        text-decoration:none;
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
<div class="mclose"><a href="javascript:void(0)" onclick="hide()" title="Отменить">&times;</a></div>
<span class="text">
 </span>
<br />
<h1><?=Yii::t('main','Сообщения про ошибки отправлено')?></h1>
</body>
</html>

