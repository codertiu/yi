<style type="text/css">
    .dinamik .ct-label{
                                                                                                                                font-size: 14px !important;
                                                                                                                              }
    .dinamik .ct-series-b .ct-point, .ct-series-b .ct-line{
        stroke: #F4C700 !important;
    }
    .dinamik .ct-series-a .ct-point, .ct-series-a .ct-line{
        stroke: #5D9206 !important;
    }
</style>
<div class="col-sm-12 module_cont pb5">
      <div class="mb-20 text-center"><h3>Davlat o'rmon xo'jaligining 1990-2015 yillar bo'yicha o'zgarish dinamikasi</h3></div>
      <div class = "ct-chart dinamik" id="hidden"></div>
    <div align="center" style="margin-bottom: 1em;"><i class="fa fa-circle colr1" style="color: #5D9206;"></i>  Умумий ДЎФ       <i class="fa fa-circle colr2" style="margin-left: 1em;color: #F4C700;"></i>  Ўрмонзор ва бутазорлар</div>
</div>


<?

$js = <<<JS
var myChart = new Chartist.Line('.dinamik', {
  labels: [1990, 1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999, 2000, 2001, 2002, 2003, 2004, 2005, 2006, 2007, 2008, 2009, 2010, 2011, 2012, 2013, 2014, 2015],
  series: 
  [
        [2507.5, 2860.1, 5243.2, 5569.1, 5901.3, 7374.2, 7294.4, 8665.4, 8696.5, 8050.4, 8073.2, 8409.2, 8578.3, 8578.3, 8597.4, 8536.5, 8543.8, 8562.3, 8661.1, 8661.2, 9462.3, 9629.6, 9635.9, 9636.9, 9630, 9752.3],
        [1410, 1333.9, 1333.7, 1327.5, 1330.3, 1254.7, 1331.6, 1341.7, 1409.6, 1420, 1511.9, 1489.5, 1490.8, 2375.4, 2817.7, 2808.1, 2811.4, 3219.6, 3220.8, 3244.1, 3312, 3328.6, 3334.9, 3335.3, 3453.4, 3543.3]
    ]
}, {
  low: 0,
  width: 1150,
  height: 400
});
document.querySelector('.dinamik').__chartist__.update();

// For the sake of the example we update the chart every time it's created with a delay of 10 seconds
myChart.on('created', function() {
  if(window.__exampleAnimateTimeout) {
    clearTimeout(window.__exampleAnimateTimeout);
    window.__exampleAnimateTimeout = null;
  }
  window.__exampleAnimateTimeout = setTimeout(myChart.update.bind(myChart), 12000);
});
jQuery('.shortcode_tab_item_title').on( "tabshown", function(){
    myChart.update.bind(myChart);
});
JS;
$this->registerJs($js);

?>