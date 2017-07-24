<?php
use frontend\widgets\ReceptionStatistic;
?>
<section style="margin-top:50px;margin-bottom:150px;">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <?= ReceptionStatistic::widget(['type' => 'manual']) ?>
        </div>
        <div class="col-md-6">
            <?= ReceptionStatistic::widget(['type' => 'site']) ?>
        </div>
    </div>
    </div>
</section>