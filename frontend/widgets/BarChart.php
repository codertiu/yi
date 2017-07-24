<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/3/17
 * Time: 4:16 PM
 */

namespace frontend\widgets;


use yii\base\Widget;

class BarChart extends Widget
{
    public $values =  [60.8, 9.9, 4.5, 4.2, 2.5, 2.3, 1.8, 10, 4];
    public $labels = ['Саксовул (Haloxylon)', 'Арча (Juniperus)', 'Юлғун (Tamarix)', 'Черкез (Salsola)','Туранга (Turanga)', 'Ёнғоқ мевали', 'Қандим','Бошқа  бутусимонлар','Бошқа дарахтлар'];

    public function run()
    {
        return $this->render('barChart',['values' => $this->values,'labels' => $this->labels]);
    }
}