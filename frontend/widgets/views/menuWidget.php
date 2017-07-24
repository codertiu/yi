<?php
use common\models\Menu;


if($models['parent'] === NULL){
    $mid = $models['id'];
    $dim = $models['parent'];
}elseif($models['parent'] != NULL){
    $mid = $models['parent'];
    $dim = $models['id'];
}
//echo $models['id'];

function rightMenu($id = NULL, $di = NULL){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);
    $out .= '<div class="res-bg2
    ">';
    $out .= '<ul class="menuleftso">';
    if($_query->exists()){
        $out .= '<li class="menu-item-has-children2">';
        $out .= '<a href="' .$menu->url. '">' ;

        $out .= $menu->title.'</a>';







        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            if($di == $item->id) $out .= '<li class="active-menu2">'; else $out .= '<li>';
            $out .= '<a href="' .$item->url. '">';
            $out .= $item->title.'</a>';
            $out .= '</li>';
        }

        $out .= '</li>';

    }
    else{
        $out .= '<li><a href="' .$menu->url. '">';
        if($menu->icon)
            $out .= '<i class="' . $menu->icon. '">';
        $out .= $menu->title.'</a></i>';
    }
    $out .= '</ul>';
    $out .= '</div>';

    return $out;
}

?>

<?php

echo rightMenu($mid, $dim);
?>



