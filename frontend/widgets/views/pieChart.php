<style type="text/css">
    .ct-chart3 .ct-series-a .ct-slice-pie{
        fill: #ED5F4B !important;
    }
    .ct-chart3 .ct-series-b .ct-slice-pie{
        fill: #F4C700 !important;
    }
    .ct-chart3 .ct-series-c .ct-slice-pie{
        fill: #5D9206 !important;
    }


</style>
<div class="col-md-4 heshes">
    <div class = "ct-chart3" style="width: 200px;height: 200px;margin:0 auto;"></div>
</div>
<?php
$trcved = $data['rcved'] == 0 ? '' : $data['rcved'];
$tinprg = $data['inprg'] == 0 ? '' : $data['inprg'];
$tdone = $data['done'] == 0 ? '' : $data['done'];
?>
<?
$this->registerJs("
var data = {
  series: [".$trcved.", ".$tinprg.", ".$tdone."],
   width: 200,
  height: 200
};

var summ = function(a, b) { return a + b };

new Chartist.Pie('.ct-chart3', data, {
  labelInterpolationFnc: function(value) {
    return Math.round(value / data.series.reduce(summ) * 100) + '%';
  }
});
");
?>