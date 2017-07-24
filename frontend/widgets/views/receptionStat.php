<?php

?>

<ul class="color-li">
    <li><i class="fa fa-circle colr8"> </i> <?= Yii::t('main', 'От физических лиц:')?> <?=$data['physc']?> / <?=$data['physc_f']?>%</li>
    <li><i class="fa fa-circle colr4"> </i> <?= Yii::t('main', 'От юридических лиц:')?> <?=$data['legal']?> / <?=$data['legal_f']?>%</li>
    <li><i class="fa fa-circle colr1"> </i> <?= Yii::t('main', 'Необработанные:')?> <?=$data['rcved']?> / <?=$data['rcved_f']?>%</li>
    <li><i class="fa fa-circle colr3"> </i> <?= Yii::t('main', 'В обработке:')?> <?=$data['inprg']?> / <?=$data['inprg_f']?>%</li>
    <li><i class="fa fa-circle colr6"> </i> <?= Yii::t('main', 'Завершенных:')?> <?=$data['done']?> / <?=$data['done_f']?>%</li>
</ul>