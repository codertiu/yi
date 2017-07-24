<?php
use common\components\StaticFunctions;
?>
<ul class="item_list">
<?php
    foreach($models as $model) {
    $image = \common\models\Image::find()->where('status>-1 AND album='.$model->id);
    $image = $image->exists() ? \common\components\StaticFunctions::getImage($image->one()->guid.'.'.$image->one()->extension) : Yii::$app->params['default_post_image'];
    ?>
    <li>
        <div class="item">
            <div class="item_wrapper">
                <div class="img_block wrapped_img">
                    <img alt="" src="<?=$image?>">
                    <span class="block_fade"></span>
                    <a class="featured_ico_link view_link" href="/gallery/album/<?=$model->id?>"><i class="icon-link"></i></a>
                </div>
                <div class="featured_items_body">
                    <div class="featured_items_title">
                        <h5><a href="/gallery/album/<?=$model->id?>"><?=StaticFunctions::getPartOfText($model->getLang('name'), 47)?></a></h5>
                    </div>
                    <div class="featured_item_content"><?=StaticFunctions::getPartOfText($model->getLang('description'), 87)?></div>
                    <div class="featured_meta"><?=date('d.m.Y',strtotime($model->created_date))?></div>
                </div>
            </div>
        </div>
    </li>
    <?php } ?>
</ul>