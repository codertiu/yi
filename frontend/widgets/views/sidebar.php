<?php
    $uril = trim($_SERVER['REQUEST_URI'], '/');
    ?>

<?= \frontend\widgets\MenuWidget::widget([
    'uri' => $uril,
]);

if ($Banner2 == true):

    echo \frontend\widgets\MiniRectangleBanner::widget();

endif;


if ($RStatistic == true) {
    echo \frontend\widgets\ReceptionStatistic::widget(['type' => 'site', 'view' => 'portrait']);
}

if($Status == true) {
    echo \frontend\widgets\ReceptionStatus::widget();
}

if ($Banner == true):
?>
<?=\frontend\widgets\MiniSquareBanner::widget()?>
    <?php
    endif;
    ?>

<?php
if ($Weather == true):
    ?>
<?=\frontend\widgets\Weather::widget()?>
    <?php
endif;
?>

<?php
if ($Poll == true):
    ?>
<?= \frontend\widgets\Poll::widget() ?>
    <?php
endif;
?>

