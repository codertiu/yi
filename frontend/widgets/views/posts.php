<!--Bu katta ko'rinishi -->
<div class="col-md-8">
    <div class="section-title"><?= Yii::t('main','Новости') ?></div>
    <div class="news">
        <div class="news-slider owl-carousel">
            <?php foreach($models as $model) {
                echo \frontend\widgets\PostPreview::widget(['model' => $model]);
            } ?>
        </div>
    </div>
    <div class="section-title event-title"><?= Yii::t('main','События') ?></div>
    <div class="event">
        <div class="events event-slider owl-carousel">
            <?php foreach($models2 as $model2) {
                echo \frontend\widgets\PostPreview::widget(['model' => $model2, 'mini' => true]);
            } ?>
        </div>
    </div>
</div>

<?/*=\frontend\widgets\EventSlider::widget()*/?><!--
<?/*=\frontend\widgets\MiniBanner::widget() */?>
--><?/*=\frontend\widgets\Weather::widget()*/?>