<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/13/16
 * Time: 10:56 AM
 */

?>

<h1 class="allheadone332"><?= Yii::t('main','События') ?></h1>
<div class="eventlar">
    <div class="eventslider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $first = true; $i = 0; foreach($models as $model) { ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?=$i++?>" class="<?=$first ? 'active' : ''?>"></li>
                <?php $first = false; } ?>
            </ol>

            <div class="carousel-inner" role="listbox">
                <?php $first = true; foreach($models as $model) {
                    $image = \common\components\StaticFunctions::getImage($model->secondary_image,false);
                    $date = date('d M', strtotime($model->event_date));
                    ?>
                    <div class="item <?=$first ? 'active' : ''?> opque">
                        <img src="<?=$image?>" alt="...">
                        <div class="carousel-caption custum-caption">
                            <span><?=$date?></span>
                            <?=$model->getLang('title')?>
                        </div>
                    </div>
                <?php $first = false; } ?>
            </div>


        </div>
    </div>
</div>
