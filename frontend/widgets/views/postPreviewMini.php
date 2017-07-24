<?php
use common\components\StaticFunctions;
?>


<div class="event-item">
    <div class="event-img" style="background-image: url('<?=$image?>')">
        <div class="event-hover-box">
            <a class="img-link" href="/post/view/<?=$id?>">
                <i class="fa fa-link"></i>
            </a>
            <a class="img-link" href="<?=$image?>" data-rel="lightcase">
                <i class="fa fa-image"></i>
            </a>
        </div>
    </div>
    <a href="/post/view/<?=$id?>">
        <div class="event-title"><?= StaticFunctions::getPartOfText($title, 85)?></div>
        <div class="event-content"><?= StaticFunctions::getPartOfText($title, 85) ?></div>
    </a>
</div>