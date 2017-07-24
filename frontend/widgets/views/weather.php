<?php
if (is_object($pogoda) && $pogoda->currently->temperature){
    $celcius = round(($pogoda->currently->temperature - 32) / 1.8);
?>

    <div class="weather-box">
        <div class="weather">
            <div><?= Yii::t('main','Погода в ташкенте') ?></div>
        </div>
        <div class="weather-icon">
            <img src="/img/cloud.png">
        </div>
        <div class="weather-info">
            <span><?= Yii::t('main','Температура ') ?>:<?=$celcius?>°</span>
            <span><?= Yii::t('main','Влажнось')?> <?= $pogoda->currently->humidity * 100 ?>%<br><?= Yii::t('main','Ветер')?> <?= $pogoda->currently->windSpeed ?> м/c</span>
        </div>
    </div>
    <?php
}
?>