<?php
use common\components\StaticFunctions;
?>

<div class="news-item">
    <div class="news-img" style="background-image: url('<?= $image?>')">

        <div class="news-hover-box">
            <a class="img-link" href="/post/view/<?=$id?>">
                <i class="fa fa-link"></i>
            </a>
            <a class="img-link" href="<?= $image?>" data-rel="lightcase">
                <i class="fa fa-image"></i>
            </a>
        </div>
    </div>

    <a href="/post/view/<?=$id?>">
        <div class="news-title"><?=StaticFunctions::getPartOfText($title, 57)?></div>
        <div class="news-content"><?=StaticFunctions::getPartOfText($anons, 57)?></div>
    </a>
</div>

