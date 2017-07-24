<section class="newsandevents hidden-xs fw_block pt46 pb45 light-green_bg mb40 mt_90 row">
    <div class="col-md-8">
            <img src="<?=Yii::$app->params['images_path']?>original/<?=\common\models\Post::find()->where('status>-1 and category = 5')->
            orderBy(['id' => SORT_DESC])->one()->main_image ?>" alt="">
    </div>
    <div class="col-md-4">
            <?= \frontend\widgets\Weather::widget();?>
    </div>
</section>