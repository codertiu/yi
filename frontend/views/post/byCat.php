<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/14/16
 * Time: 3:40 PM
 */
use common\components\StaticFunctions;
$models = $provider->getModels();



$this->params['breadcrumbs'][] = $name;
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
                <div class="posts">
                    <?php foreach($models as $model){
                        $one = \common\models\Post::findOne($model['id']);
                        $dir = realpath(dirname(__FILE__)) . '/../..' . Yii::$app->params['images_dir'] . 'square/';
                        $image = $one->main_image && file_exists($dir . $one->main_image) ? Yii::$app->params['images_path'] . 'square/' . $one->main_image : Yii::$app->params['default_post_image'];
                        ?>

                    <div class="post-item">
                        <div class="post-img">
                            <a href="">
                                <img src="<?= $image?>" alt="">
                            </a>
                        </div>
                        <div class="post-content">
                            <div class="post-title">
                                <a href="/post/view/<?= $one->id?>"><?=\common\components\StaticFunctions::kcfinder($one->getLang('title'))?></a>
                            </div>
                            <div class="post-desc"><?=\common\components\StaticFunctions::kcfinder($one->getLang('anons'))?></div>
                            <div class="post-footer">
                                <div class="post-date"><i class="fa fa-clock-o"></i> <?= date('d.m.Y',strtotime($one->created_date)) ?></div>

                                <a href="/post/view/<?= $one->id?>"><?= Yii::t('main','Подробнее')?></a>
                            </div>
                        </div>
                    </div>
                    <? }?>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>
