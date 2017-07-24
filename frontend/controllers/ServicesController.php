<?php

namespace frontend\controllers;

use common\models\Admission;
use common\models\CompanySignupForm;
use common\models\ReceptionForm;
use common\models\Settings;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class ServicesController extends Controller
{
    public function actionBlanks()
    {
        return $this->render('blanks');
    }

    public function actionCv()
    {
        return $this->render('cv');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionQa()
    {
        return $this->render('qa');
    }

    public function actionUploadFileReception()
    {
        $fileName = 'file';
        $uploadPath = Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'reception';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
            if($file->extension=='php'){
                $file->name = uniqid().'_'.rand().time().'_'.Yii::$app->guest->id.'.'.$file->extension.'file';
            } else {
                $file->name = uniqid().'_'.rand().time().'_'.Yii::$app->guest->id.'.'.$file->extension;
            }
            $fullname = $uploadPath . DIRECTORY_SEPARATOR . $file->name;
            if ($file->saveAs($fullname)) {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $file;
            }
        }
        return false;
    }

    public function actionReception($id=0)
    {
        $model = new ReceptionForm();
        $admission = ArrayHelper::map(Admission::find()->where('status > 0')->orderBy('order_by')->all(), 'id', 'fullname');
        $mq = Admission::find()->where(['id' => $id]);
        if($id > 0 && $mq->exists()){
            $model->admissionId = $id;
            $manager = $mq->one();
        } else {
            $manager = false;
        }
        $formSubmitted = false;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                $formSubmitted = true;
            }
        }


        return $this->render('reception', [
            'model' => $model,
            'select' => $id,
            'manager' => $manager,
            'admission' => $admission,
            'formSubmitted' => $formSubmitted,
        ]);
    }

    public function actionVirtualReception()
    {
        $model = new ReceptionForm();
        $mq = Admission::find()->where(['id' => Settings::findOne('director_id')->val]);
        if($mq->exists()){
            $model->admissionId = 1;
            $manager = $mq->one();
        } else {
            $manager = false;
        }
        $formSubmitted = false;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                $formSubmitted = true;
            }
        }


        if (!Yii::$app->session->has('_oferta')) {
            Yii::$app->session->set('_oferta', 0);
        }
        return $this->render('virtual-reception', [
            'model' => $model,
            'manager' => $manager,
            'formSubmitted' => $formSubmitted,
        ]);
    }

    public function actionTurnoffOferta() {
        Yii::$app->session->set('_oferta',-1);
        return Yii::$app->session->get('_oferta');
    }

    public function actionCompanySignup()
    {
        $model = new CompanySignupForm();
        $formSubmitted = false;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                $formSubmitted = true;
            }
        }

        return $this->render('company-signup', [
            'model' => $model,
             'formSubmitted' => $formSubmitted,
        ]);
    }

    public function actionRecommendations()
    {
        return $this->render('recommendations');
    }

    public function actionUseful()
    {
        return $this->render('useful');
    }

}
