<?php
    use common\models\PostCategory;
    $category = new PostCategory();
?>
<section class="section-slider">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slider-box owl-carousel">
                    <?php foreach($models as $model){
                        $dir = realpath(dirname(__FILE__)).'/../../..'.Yii::$app->params['images_dir'];
                        $image = $model->main_image && file_exists($dir.'original/'.$model->main_image) ? Yii::$app->params['images_path'] .'original/' . $model->main_image : Yii::$app->params['default_post_image'];

                        ?>
                    <div class="slider-item">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="#">
                                    <div class="slider-img">
                                        <img src="<?= $image ?>" alt="" class="img-responsive">
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="slider-text-content">
                                    <div class="slider-category-title"><?= $category->findOne(['id'=>$model->category])->getLang('name')?></div>
                                    <div class="slider-title">
                                        <a href="/post/view/<?=$model->id?>"><?=$model->getLang('title')?></a>
                                    </div>
                                    <div class="slider-content"><?=$model->getLang('anons')?>
                                        <div class="slider-date"><?= date('d.m.Y', strtotime($model->created_date))?></div>
                                        <div class="slider-readmore"><a href="/post/view/<?=$model->id?>"><?=Yii::t('main','Читать подробнее...')?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>
