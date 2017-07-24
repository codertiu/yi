<?php
use common\components\StaticFunctions;
?>

<div class="banner-oziq" style="margin-bottom: 1.7em;">
        <?php
        if($square_banner_query['url']):
        ?>
        <a href="<?= $square_banner_query['url']?>">
        <?php
        endif;
        ?>
        <img src="<?=StaticFunctions::getImage($model,false,true)?>" />
        <?php
        if($square_banner_query['url']):
        ?>
        </a>
        <?php
        endif;
        ?>
</div>
