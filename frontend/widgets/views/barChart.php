<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 4:17 PM
 */


$valuesStr = implode(',', $values);
?>


<div class="row">
    <div class="col-md-9">
        <div class="ct-chart"></div>
    </div>
    <div class="col-md-3">
        <ul class="color-li">

            <? for ($i = 0; $i < count($values);$i++){
               echo  '<li><i class="fa fa-circle colr'.($i+1).'"> </i>' . $labels[$i] . '-' . $values[$i] .'%</li>';
            }?>

        </ul>
    </div>


</div>


<? $this->registerJs("

    new Chartist.Bar('.ct-chart', {
    
        series: [".$valuesStr."]
        
    }, {
        distributeSeries: true,
        width: 900,
        height: 400
    });


");
?>