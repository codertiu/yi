<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 12/8/16
 * Time: 5:06 PM
 */
/** @var string $view */
/** @var boolean $allow */

if($allow) {

    ?>
    <h2><?= Yii::t('main','Статистика') ?></span></h2>
    <?php
    if ($view == 'portrait'){
        ?>
        <div class="hellostat mt-3">
            <span class="pl-1 pr-1"><b><?= $title ?></b></span>
            <p class="pl-1 pr-1"><?=Yii::t('main','за период с {strdate}  по {enddate} <b>информация обновлено {upddate}</b>', ['strdate'=>$strdate, 'enddate'=>$enddate, 'upddate'=>$upddate])?></p>
            <div class="slide-anis">
                <div class="row">
                    <div class="mb-2">
                        <div class="thestat2">
                            <p class="center-block">
                                <span><?= $total ?></span>
                            </p>
                            <span><?= Yii::t('main','Поступивших обращений') ?></span>
                        </div>
                    </div>
                    <div class="thestcf">
                        <p><?= Yii::t('main','От физических лиц:') ?>  <?= $physc .' / '. $physc_f ?>%</p>
                        <div class="progress progressize2">
                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?=$physc_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$physc_f?>%">
                                <span class="sr-only"><?=$physc_f?> Complete (success)</span>
                            </div>
                        </div>
                        <p><?= Yii::t('main','От юридических лиц:') ?> <?= $legal .' / '. $legal_f ?>%</p>
                        <div class="progress progressize2">
                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?=$legal_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$legal_f?>%">
                                <span class="sr-only"><?=$legal_f?> Complete (success)</span>
                            </div>
                        </div>
                        <p><?= Yii::t('main','Необработанные:') ?>  <?= $rcved .' / '. $rcved_f ?>%</p>
                        <div class="progress progressize2">
                            <div class="progress-bar progress-bar-default progress-bar-striped" role="progressbar" aria-valuenow="<?=$rcved_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$rcved_f?>%">
                                <span class="sr-only"><?=$rcved_f?> Complete (success)</span>
                            </div>
                        </div>
                        <p><?= Yii::t('main','В обработке:') ?>   <?= $inprg .' / '. $inprg_f ?>%</p>
                        <div class="progress progressize2">
                            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?=$inprg_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$inprg_f?>%">
                                <span class="sr-only"><?=$inprg_f?> Complete (success)</span>
                            </div>
                        </div>
                        <p><?= Yii::t('main','Завершенных:') ?> <?= $done .' / '. $done_f ?>%</p>
                        <div class="progress progressize2">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?=$done_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$done_f?>%">
                                <span class="sr-only"><?=$done_f?> Complete (success)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <span><b><?=$title?></b></span>
        <?=Yii::t('main','за период с {strdate}  по {enddate} <b>информация обновлено {upddate}</b>', ['strdate'=>$strdate, 'enddate'=>$enddate, 'upddate'=>$upddate])?>
        <div class="slide-ani">
            <div class="row mt-2">
                <div class="col-md-4">
                    <div class="thestat">
                        <p class="center-block">
                            <span><?= $total ?></span>
                        </p>
                        <span><?= Yii::t('main','Поступивших обращений') ?></span>
                    </div>
                </div>
                <div class="col-md-8">
                    <p><?= Yii::t('main','От физических лиц:') ?>  <?= $physc .' / '. $physc_f ?>%</p>
                    <div class="progress progressize2">
                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?=$physc_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$physc_f?>%">
                            <span class="sr-only"><?=$physc_f?> Complete (success)</span>
                        </div>
                    </div>
                    <p><?= Yii::t('main','От юридических лиц:') ?> <?= $legal .' / '. $legal_f ?>%</p>
                    <div class="progress progressize2">
                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?=$legal_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$legal_f?>%">
                            <span class="sr-only"><?=$legal_f?> Complete (success)</span>
                        </div>
                    </div>
                    <p><?= Yii::t('main','Необработанные:') ?>  <?= $rcved .' / '. $rcved_f ?>%</p>
                    <div class="progress progressize2">
                        <div class="progress-bar progress-bar-default progress-bar-striped" role="progressbar" aria-valuenow="<?=$rcved_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$rcved_f?>%">
                            <span class="sr-only"><?=$rcved_f?> Complete (success)</span>
                        </div>
                    </div>
                    <p><?= Yii::t('main','В обработке:') ?>   <?= $inprg .' / '. $inprg_f ?>%</p>
                    <div class="progress progressize2">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?=$inprg_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$inprg_f?>%">
                            <span class="sr-only"><?=$inprg_f?> Complete (success)</span>
                        </div>
                    </div>
                    <p><?= Yii::t('main','Завершенных:') ?> <?= $done .' / '. $done_f ?>%</p>
                    <div class="progress progressize2">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?=$done_f?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$done_f?>%">
                            <span class="sr-only"><?=$done_f?> Complete (success)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>