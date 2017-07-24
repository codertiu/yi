<div class="shortcode_tab_item_title expand_no"><?=Yii::t('main','Полезные <span>ресурсы</span>')?></div>
<div class="shortcode_tab_item_body tab-content clearfix">
    <div class="ip">
        <div class="tab_content lilikn">
            <?php foreach($models as $model) { ?>
            <div class="col-md-4">
                <a href="<?=$model->url?>"><span class="linkos"><i class="fa fa-link"></i></span><?=$model->title?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>