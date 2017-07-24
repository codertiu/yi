<?php

$this->params['breadcrumbs'][] = [ 'label'  => Yii::t('main','Albomlar'), 'url' => '/gallery/albums'];
$this->params['breadcrumbs'][] = $model->getLang('name');

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
                            //'options' => ['template' => ']
                        ]) ?>
                    </div>
                    <div class="albums-page">
                        <div class="section-single-title"><?=$model->getLang('name')?></div>

                        <div class="row">
                            <?php foreach($images as $image) {
                            $image = $image->guid.'.'.$image->extension;
                            ?>
                            <div class="col-md-4">
                                <div class="album-item">
                                    <a href="<?=\common\components\StaticFunctions::getImage($image,false)?>">
                                        <div class="album-img" style="background-image: url('<?=\common\components\StaticFunctions::getImage($image,false)?>')"></div>
                                    </a>
                                    <a class="img-link" href="<?=\common\components\StaticFunctions::getImage($image,false)?>" data-rel="lightcase">
                                        <div class="album-hover">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>