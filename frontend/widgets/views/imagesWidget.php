<div class="col-sm-3 hidden-xs">
    <div class="sidepanel widget_flickr photo_gallery">
        <h4 class="title"><?= Yii::t('main','Фотолента')?></h4>
        <div class="flickr_widget_wrapper">
            <?php foreach($models as $model) {
                $dir = realpath(dirname(__FILE__)).'/../../../'.Yii::$app->params['images_dir'].'square/';
                $filename = $model->guid.'.'.$model->extension;
                $path = Yii::$app->params['images_path'];
                if(file_exists($dir.$filename)) { ?>
                    <a href="<?=$path.'original/'.$filename?>" class="photozoom"><img style="display: block; width: 80px; height: 80px;" src="<?=$path.'square/'.$filename?>" /></a>

                <?php } } ?>
        </div>
    </div>
</div>



