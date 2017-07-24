<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/29/16
 * Time: 4:50 PM
 */

?>


<div class="wall_map">
    <a class="map_collapse" data-toggle="collapse" href="#collapse_map" aria-expanded="false" aria-controls="collapse_map"><?= Yii::t('main', 'Карта проезда')?>    <i class="icon-map-marker"></i></a>
    <div class="collapse" id="collapse_map">
        <div class="module_google_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1498.9111270736767!2d69.20950972165797!3d41.29097275062095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1483535002446" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div>
