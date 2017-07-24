<?php

namespace backend\controllers;

use Yii;
use backend\models\AdmissionForm;
use common\models\AdmissionLang;
use common\models\Admission;
use common\models\AdmissionSearch;
use common\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\StaticFunctions;

/**
 * AdmissionController implements the CRUD actions for Admission model.
 */
class AdmissionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Admission models.
     * @return mixed
     */ 
    public function actionIndex()
    {

        if(Yii::$app->request->post()){
            $items = Yii::$app->request->post()['del_input'];
            $items = explode(',', $items);
            for($i = 0; $i < count($items) - 1;$i++){
                if($items[$i] != null)
                    Admission::findOne($items[$i])->delete();
            }
        }
        $searchModel = new AdmissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=Yii::$app->params['pagination'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Admission model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Admission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdmissionForm();
        $model->language_id = Yii::$app->lang->defaultId;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpload()
    {
        $fileName = 'file';
        $uploadPath = Yii::getAlias('@frontend') . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'admission';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
            if($file->extension=='php'){
                $file->name = uniqid().'_'.time().'.'.$file->extension.'file';
            } else {
                $file->name = uniqid().'_'.time().'.'.$file->extension;
            }
            $fullname = $uploadPath . DIRECTORY_SEPARATOR . $file->name;
            if ($file->saveAs($fullname)) {
                StaticFunctions::makeSquareImage($fullname);
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return $file;
            }
        }
        return false;
    }
    /**
     * Updates an existing Admission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$lang=0)
    {
        if($lang == 0) {
            $lang = Yii::$app->lang->defaultId;
        }
        $adm = $this->findModel($id); // Admission
        $model = new AdmissionForm(); // Yangi forma
        $model->isNewRecord = false;
        $lq = Languages::findOne($lang); // Language
        $adlang = AdmissionLang::find()->where(['language_id' => $lang, 'admission_id' => $adm->id])->one(); // Admission Language
        if($lq) {
            if($adlang){
                $model->name = $adlang->name;
                $model->level_name = $adlang->level_name;
                $model->reception_days = $adlang->reception_days;
            }
            $model->id = $adm->id;
            $model->status = $adm->status;
            $model->order_by = $adm->order_by;
            $model->phone = $adm->phone;
            $model->fax = $adm->fax;
            $model->email = $adm->email;
            $model->site = $adm->site;
            $model->image = $adm->image;
            $model->blog = $adm->blog;
            $model->biography = $adm->biography;
            $model->language_id = $lang;
            if ($model->load(Yii::$app->request->post()) && $model->update()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'adm' => $adm,
                ]);
            }
        } else {
            return $this->redirect(['view', 'id' => $id]);
        }
    }

    /**
     * Deletes an existing Admission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
