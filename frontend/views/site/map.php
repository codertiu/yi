<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 16.12.2016
 * Time: 23:29
 */

use common\models\Menu;

$this->title = Yii::t('main',Yii::t('main', 'Sayt xaritasi'));
$this->params['breadcrumbs'][] = $this->title;


function renderMap($id, $isParent=false){
    $out = '';
    $menu = Menu::find()->where('status>-1')->andWhere(['id' => $id])->one();
    $_query = Menu::find()->where('status>-1')->andWhere(['parent' => $id]);
    if($_query->exists()){
        $out .= '<li>';
        $out .= '<a href="'.$menu->url.'">'.$menu->title.'</a>';
        //if($isParent){
            $out .= '<ul>';//ota
       // }else{
            $out .= '<ul>';
       // }
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $out .= renderMap($item->id);
        }
        $out .= '</ul></li>';
    } else {
        $out .= '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
    }
    return $out;
}


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
                <div class="sitemap-page">
                    <div class="section-single-title"><?= Yii::t('main','Карта сайта')?></div>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="sitemap">
                                <? $menuItems = Menu::find()->where('status>-1')->andWhere(['parent' => NULL])->orderBy(['order_by' => SORT_ASC])->all();

                                foreach ($menuItems as $menuItem) {
                                echo renderMap($menuItem->id,true);
                                } ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9 zindex">
                <?= \frontend\widgets\menu\LeftMenu::widget(); ?>
                <?= \frontend\widgets\Calendar::widget();?>
            </div>
        </div>
    </div>
</section>