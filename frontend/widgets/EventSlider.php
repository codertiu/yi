<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/13/16
 * Time: 10:57 AM
 */

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class EventSlider extends Widget {

    public $limit = 3;

    public function run()
    {
        $query1 = Post::find()->where('status>-1 AND category='.Post::EVENT_SLIDER.' AND event_date>DATE(NOW())')->orderBy(['id' => SORT_ASC]);
        $query2 = Post::find()->where('status>-1 AND category='.Post::EVENT_SLIDER.' AND event_date<DATE(NOW())')->orderBy(['id' => SORT_DESC]);
        if($query1->exists())
            $models = $query1->limit($this->limit)->all();
        elseif($query2->exists())
            $models = $query2->limit($this->limit)->all();
        else
            return false;

        return $this->render('eventSlider', ['models' => $models]);
    }

}