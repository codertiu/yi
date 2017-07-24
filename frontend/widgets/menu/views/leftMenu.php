<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 3:35 PM
 */
use common\models\Menu;
function renderLeft($id){
    $i=1;
    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => Menu::LEFT_SIDE])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => Menu::LEFT_SIDE]);

    if($_query->exists()){
        $bool = $i==1?'true':'false';
        $out .= '<li><a data-toggle="collapse" data-parent="#accordion" href="#'.$menu->id.'" aria-expanded="true"><span>';

        $out .= $menu->title.'</span></a>';
        $out .= '<div class="collapse in" id="'.$menu->id.'"><ul>';

        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();

        foreach ($items as $item){
            $out .= renderLeft($item->id);
        }

        $out .= '</ul></div></li>';
    }
    else{
        $out .= '<li><a href="' .$menu->url. '"><span>'.$menu->title.'</span></a></li>';
    }

    return $out;

}

?>




    <div class="content-menu">
        <ul id="accordion">
            <?php
            $menuItems = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => Menu::LEFT_SIDE])->orderBy(['order_by' => SORT_ASC])->all();
            $i=1;
            foreach ($menuItems as $menuItem) {
                $out = '';
                $menu = Menu::find()->where('status=1')->andWhere(['id' => $menuItem->id, 'type' => Menu::LEFT_SIDE])->one();
                $_query = Menu::find()->where('status=1')->andWhere(['parent' => $menuItem->id, 'type' => Menu::LEFT_SIDE]);

                if($_query->exists()){
                    $bool = $i==1?'true':'false';
                    $bool1 = $i==1?'in':'';
                    $out .= '<li><a data-toggle="collapse" data-parent="#accordion" href="#'.$menu->id.'" aria-expanded="'.$bool.'"><span>';

                    $out .= $menu->title.'</span></a>';
                    $out .= '<div class="collapse '.$bool1.'" id="'.$menu->id.'"><ul>';

                    $items = $_query->orderBy(['order_by' => SORT_ASC])->all();

                    foreach ($items as $item){
                        $out .= renderLeft($item->id);
                    }

                    $out .= '</ul></div></li>';
                    $i++;
                }
                else{
                    $out .= '<li><a href="' .$menu->url. '"><span>'.$menu->title.'</span></a></li>';
                }

                echo $out;
            }
            ?>
        </ul>
        <div class="show-accordion">
            <div class="show-accordion-box">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="virtual">
            <i class="fa fa-commenting"></i>
            <span>Виртуальная приемная министра культуры</span>
        </div>
    </div>
