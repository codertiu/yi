<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 3:54 PM
 */

?>

<div class="company-item">
    <div class="company-img">
        <a href="">
            <div style="background-image: url('<?= $image ?>')"></div>
        </a>
    </div>
    <div class="company-content">
        <div class="company-title">
            <a href="/site/company/<?=$id?>"><?=$title?></a>
        </div>
        <div class="company-info">
            <div><span><?= Yii::t('main','Rahbari')?>: </span> <?= $leader ?></div>
            <div><span><?= Yii::t('main','Qabul kunlari')?>: </span> <?= $reception ?></div>
            <div><span><?=Yii::t('main','Email')?>: </span><?=$email?></div>
            <div><span><?=Yii::t('main','Telefon: ')?>: </span><?=$phone?></div>
        </div>
        <div class="company-footer">
            <a href="/site/company/<?=$id?>"><?=Yii::t('main','Далее')?></a>
        </div>
    </div>
</div>

<hr>