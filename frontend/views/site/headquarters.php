<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 15.12.2016
 * Time: 18:57
 */
use common\models\Settings;
use yii\helpers\Url;

/** @var \common\models\Admission[] $adms */
$this->title = Yii::t('main', 'Admissions');
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="section-breadcrumb">
                    <?=
                    \yii\widgets\Breadcrumbs::widget([
                        'itemTemplate' => "<a>{link}</a> - ",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        //'options' => ['class' => 'breadcrumb hidden-xs']
                    ]) ?>
                </div>
                <div class="company-page">
                    <div class="section-single-title"><?=$this->title?></div>

                    <div class="company">
                        <?php
                        foreach ($adms as $adm) {
                        if(file_exists(Yii::getAlias('@frontend') . '/web/files/admission/'.$adm->image)){
                            $image = '/files/admission/'.$adm->image;
                        } else {
                            $image = '';
                        }
                        ?>
                        <div class="company-item">
                            <div class="company-img">
                                <a href="<?=(!empty($adm->biography) ? $adm->biography : '#')?>">
                                    <div style="background-image: url('/files/admission/<?= $adm->image ?>')"></div>
                                </a>
                            </div>
                            <div class="company-content">
                                <div class="company-title">
                                    <a href="<?=(!empty($adm->biography) ? $adm->biography : '#')?>"><?= $adm->name ?></a>
                                </div>
                                <div class="company-info">
                                    <p><?= $adm->level_name ?></p>
                                    <p><b><?= Yii::t('main','Телефон') ?>:</b> <?= $adm->phone ?></p>
                                    <p><b><?= Yii::t('main','Факс:') ?></b> <?= $adm->fax ?></p>
                                    <p><b><?= Yii::t('main','Электрон почта:') ?></b> <?= $adm->email ?></p>
                                    <p><b><?= Yii::t('main','Сайт:') ?></b> <?= $adm->site ?></p>
                                    <p><b><?= Yii::t('main','Қабул кунлари: ') ?></b> <?= $adm->reception_days ?></p>

                                </div>
                                <div class="company-footer">
                                    <?php
                                    $reception_url = Settings::findOne('reception_url');
                                    if($reception_url){
                                        ?>
                                        <a href="<?= Url::to([$reception_url->val, 'id' => $adm->id]) ?>"
                                           class="button product_type_simple add_to_cart_button">
                                            <span><?= Yii::t('main','Подписатся на прием') ?></span>
                                        </a>
                                        <?php
                                    }
                                    if (!empty($adm->blog)) {
                                        ?>
                                        <a href="<?= Url::to($adm->blog) ?>"
                                           class="button product_type_simple add_to_cart_button">
                                            <span><?= Yii::t('main','Блог') ?></span>
                                        </a>
                                        <?php
                                    }
                                    $director_id = Settings::findOne('director_id');
                                    $director_url = Settings::findOne('virtual_reception_url');
                                    if ($director_id && $director_url && $director_id->val == $adm->id) {
                                        ?>
                                        <a href="<?= Url::to([$director_url->val]) ?>"
                                           class="button product_type_simple add_to_cart_button">
                                            <span><?= Yii::t('main','Virtual qabulxona') ?></span>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget() ?>
                <?= \frontend\widgets\Calendar::widget() ?>
            </div>
        </div>
    </div>
</section>