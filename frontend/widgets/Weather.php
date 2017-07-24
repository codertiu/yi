<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/8/16
 * Time: 4:43 PM
 */

namespace frontend\widgets;

use yii\base\Widget;
use yii\caching\Cache;

class Weather extends Widget {

    const API_ENDPOINT = 'https://api.darksky.net/forecast/';
    const API_KEY = '61808cf1eb727b5af7e31804d3316933';

    public function run()
    {
        $latitude = '41.2995';
        $longitude = '69.2401';
        $options = [];
        $time = time();
        try {
            $pogoda = $this->request($latitude, $longitude, $time, $options);
            return $this->render('weather',['pogoda' => $pogoda]);
        } catch (\Exception $e) {
            return '';
        }
    }

    private function request($latitude, $longitude, $time = null, $options = array())
    {
        $pogoda = \Yii::$app->cache->get('pogoda');
        $pogodatime = \Yii::$app->cache->get('pogoda_time');
        if($pogoda && $pogodatime < time() - 3600 || !$pogoda){
                $request_url = self::API_ENDPOINT . self::API_KEY . '/' . $latitude . ',' . $longitude . ((is_null($time)) ? '' : ','. $time);
                $ctx = stream_context_create(array('http' => array('method' => 'GET', 'timeout' => 10,)));
                if (!empty($options)) {
                    $request_url .= '?'. http_build_query($options);
                }
                $hdata = file_get_contents($request_url,0,$ctx);
                \Yii::$app->cache->set('pogoda',$hdata,3600*24*10);
                \Yii::$app->cache->set('pogoda_time',time(),3600*24*10);
        }
        $response = json_decode($pogoda);
        return $response;
    }

}