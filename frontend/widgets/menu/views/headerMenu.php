<?php
use common\models\Menu;
use common\models\Settings;
use common\models\SearchForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

function renderMenu($id){

        $out = '';
        $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
        $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);
        if($_query->exists()){

            $out .= '<li class="dropdown"><div data-toggle="dropdown">';
            $out .= '<a href="' .$menu->url. '">' ;
//            if($menu->icon)
//                $out .= '<i class="' . $menu->icon. '"></i>';

            $out .= $menu->title.'<i class="fa fa-chevron-down"></i></a>';
            $out .= '</div><div class="dropdown-menu"><ul>';

            $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
            foreach ($items as $item){
                $out .= renderMenu($item->id);
            }

            $out .= '</ul></div></li>';
        }
        else{
            $out .= '<li><a href="' .$menu->url. '">';
            if($menu->icon)
                $out .= '<i class="' . $menu->icon. '"></i>';
            $out .= $menu->title.'</a></li>';
        }

        return $out;

}

?>


<section class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-6">
                <a href="<?= Yii::$app->homeUrl ?>">
                    <div class="logo">
                        <div class="logo-img">
                            <img src="/img/logo.png" alt="">
                        </div>
                        <div class="logo-text">
                            <h1><?= Yii::t('main','Мининстерство культуры')?></h1>
                            <h2><?= Yii::t('main','Республики Узбекистан')?></h2>
                            <p><?= Yii::t('main','Официальный веб сайт')?></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="call-center">
                    <a data-modal="CallModal" class="md-trigger">
                        <h3><?= Yii::t('main','Единий котакт-центр')?></h3>
                        <h4><?= substr(\common\models\Settings::findOne('phone1')->val,0,7)?><span><?= substr(\common\models\Settings::findOne('phone1')->val,7)?></span></h4>

                    </a>
                    <h4><?= Yii::t('main','Все телефонные номера')?></h4>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="right-box">
                    <img src="/img/building.jpg" alt="" class="building img-responsive">
                    <div class="search-box">
                        <?php
                        $searchModel = new SearchForm();
                        $form = ActiveForm::begin(['action'=>'/site/search','enableClientScript' => false])
                        ?>
                        <?= $form->field($searchModel, 'text')->textInput(['id'=>'search','class'=>'search'])->label(false) ?>
                        <label for="search"><i class="fa fa-search"></i></label>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

                <div class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <ul>
                        <?php
                        $menuItems = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => 0])->orderBy(['order_by' => SORT_ASC])->all();

                        foreach ($menuItems as $menuItem) {
                            echo renderMenu($menuItem->id);
                        }
                        ?>

                        <li class="sitemap">
                            <a href="/site/map"><?= Yii::t('main','Карта сайта') ?></a>
                        </li>
                        <li class="lang">
                            <a><?= Yii::t('main','Язык')?></a>
                            <ul>
                                <?php foreach($langs as $lang) { ?>
                                <li>
                                    <a href="/site/lang?lang=<?=$lang['abb']?>"><?=$lang['name']?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>