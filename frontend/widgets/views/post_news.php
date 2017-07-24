<div class="row">
    <div class="col-sm-12 module_cont module_tabs pb80">
        <div class="shortcode_tabs type1 white_bg">
            <div class="all_head_sizer"><div class="all_heads_cont"></div><div class="clear"></div></div>
            <div class="all_body_sizer"><div class="all_body_cont"></div></div>
            <div class="shortcode_tab_item_title expand_yes"><?= Yii::t('main','UzbNews') ?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="featured_items">
                            <div class="items4 featured_posts">
                                <ul class="item_list">
                                    <?php foreach($models as $model) {
                                        echo \frontend\widgets\PostNewsPreview::widget(['model' => $model]);
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shortcode_tab_item_title expand_no"><?= Yii::t('main','Фото-альбомы')?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="featured_items">
                            <div class="items4 featured_posts">
                               <?= \frontend\widgets\Albums::widget()?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shortcode_tab_item_title expand_no"><?= Yii::t('main','TenCon') ?></div>
            <div class="shortcode_tab_item_body tab-content clearfix">
                <div class="ip">
                    <div class="tab_content">
                        <div class="featured_items">
                            <div class="items4 featured_posts">
                                <ul class="item_list">
                                    <?php foreach($models2 as $model2) {
                                        echo \frontend\widgets\PostNewsPreview::widget(['model' => $model2]);
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo \frontend\widgets\UsefulLinks::widget()?>
            <div class="clear"></div>
        </div>
    </div>
</div>