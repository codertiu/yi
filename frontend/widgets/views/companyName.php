<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 3:46 PM
 */

?>

<div class="onewpost hellotrans">
    <div class="row">
        <div class="col-md-3">
            <a class="" href="/post/view/<?=$id?>">
                <img class="img-responsive img-circle" style="width: 400px;" src="<?=$image?>" />
            </a>
        </div>
        <div class="col-md-9 pl-3">
            <h4><a href="/post/view/<?=$id?>"><?=$title?></a> </h4>
            <p><?=$anons?></p>
            <div class="pull-left">
                <span><i class="fa fa-calendar"></i> <?=$created_date?></span>
                <span><i class="fa fa-eye"></i> <?=$seen_count?></span>
            </div>
            <div class="pull-right">
                <a href="/post/view/<?=$id?>"><?=Yii::t('main','Далее')?></a>
            </div>
        </div>
    </div>
</div>
