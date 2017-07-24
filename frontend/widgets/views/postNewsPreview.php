<?php
use common\components\StaticFunctions;
?>
<li>
    <div class="item">
        <div class="item_wrapper">
            <div class="img_block wrapped_img">
                <img alt="" src="<?=$image?>">
                <span class="block_fade"></span>
                <a class="featured_ico_link view_link" href="/post/view/<?=$id?>"><i class="icon-link"></i></a>
            </div>
            <div class="featured_items_body">
                <div class="featured_items_title">
                    <h5><a href="/post/view/<?=$id?>"><?=StaticFunctions::getPartOfText($title, 47)?></a></h5>
                </div>
                <div class="featured_item_content"><?=StaticFunctions::getPartOfText($anons, 87)?></div>
                <div class="featured_meta"><?=$created_date?></div>
            </div>
        </div>
    </div>
</li>