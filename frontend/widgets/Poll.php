<?php

namespace frontend\widgets;
use common\models\PollData;
use yii;
use yii\base\Widget;
use common\models\Polls;

class Poll extends Widget{

    private $user_id;

    public function init()
    {
        $this->user_id = Yii::$app->guest->id;
        parent::init();
    }

    public function run()
    {
        $model = Polls::getRandom();
        if($model) {
            $voted = PollData::find()->select('option')->where(['poll' => $model->id, 'user' => $this->user_id])->scalar();
            return  $this->render('poll', compact('model','voted'));
        } else {
            return '';
        }
    }
}