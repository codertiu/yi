<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/19/16
 * Time: 3:44 PM
 */

namespace frontend\widgets;

use common\components\StaticFunctions;
use kartik\base\Widget;

class CompanyPreview extends Widget {

    public $model;

    public function run()
    {
        $model = $this->model;
        $id = $model->id;
        $image = StaticFunctions::getImage($model->icon);
        $leader = $model->getLang('leader');
        $anons = $model->getLang('anons');
        $title = $model->getLang('name');
        $reception = $model->getLang('reception');
        $email = $model->email;
        $phone = $model->phone;
        $created_date = $model->created_date;
        return $this->render('companyPreview',[
            'id' => $id,
            'image' => $image,
            'title' => $title,
            'anons' => $anons,
            'email' => $email,
            'phone' => $phone,
            'leader'=>$leader,
            'reception'=>$reception,
            'created_date' => $created_date
        ]);
    }

}
