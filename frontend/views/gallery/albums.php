<?php
$this->params['breadcrumbs'][] = Yii::t('main','Albomlar');
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
                <div class="albums-page">
                    <div class="section-single-title"><?=Yii::t('main','Фото-альбомы')?></div>

                    <div class="row">
                        <?php foreach($models as $model) {
                        $image = \common\models\Image::find()->where('status>-1 AND album='.$model->id);
                        $image = $image->exists() ? \common\components\StaticFunctions::getImage($image->one()->guid.'.'.$image->one()->extension) : Yii::$app->params['default_post_image'];
                        ?>
                        <div class="col-md-4">
                            <div class="album-item album-list">
                                <a href="/gallery/album/<?=$model->id?>">
                                    <div class="album-img" style="background-image: url('<?= $image?>')"></div>
                                </a>
                                <div class="album-info">
                                    <a href="/gallery/album/<?=$model->id?>">
                                        <div class="album-title"><?=$model->getLang('name')?></div>
                                    </a>
                                    <div class="album-footer">
                                        <div class="album-view"><i class="fa fa-eye"></i> <?=$model->seen_count?></div>
                                        <div class="album-date"><?=date('d.m.Y',strtotime($model->created_date))?><i class="fa fa-calendar"></i></div>
                                    </div>

                                </div>
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
