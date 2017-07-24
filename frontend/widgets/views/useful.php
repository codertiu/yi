<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/16/16
 * Time: 5:06 PM
 */

?>

<h1 class="allheaders ">
    <?= Yii::t('main','Полезно<span>узнать</span>') ?>
</h1>
<div class="useful">
    <div class="useful-bg" style="background: url('<?=\common\components\StaticFunctions::getImage($model->secondary_image, false)?>') no-repeat bottom right">
        <div class="caption-223">
            <?=$model->getLang('title')?>
        </div>
        <div class="noo-button-creative">
            <a href="/post/view/<?=$model->id?>">
                <span class="first"></span>
                <span class="second"></span>
                <?= Yii::t('main','Подробнее') ?>
                <span class="three"></span>
                <span class="four"></span>
            </a>
        </div>
    </div>
</div>
