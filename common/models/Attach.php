<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attach".
 *
 * @property integer $id
 * @property integer $section
 * @property integer $parent
 * @property string $name
 * @property string $guid
 * @property string $extension
 * @property integer $size
 * @property integer $creator
 * @property string $created_date
 * @property integer $status
 */
class Attach extends \yii\db\ActiveRecord
{
    const POST = 1;

    /**
     * section - bu faylni qaysi bo'limga (jadvalga) tegishli ekani, section > 0
     * parent - bu faylni aynan qaysi obekt uchun tegishliligi, parent > 0
     */
    public static function tableName()
    {
        return 'attach';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['section', 'parent', 'name', 'guid', 'extension', 'size', 'creator', 'created_date'], 'required'],
            [['section', 'parent', 'size', 'creator', 'status'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'guid'], 'string', 'max' => 100],
            [['extension'], 'string', 'max' => 6],
        ];
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        $log = new Log();
        $log->user = Yii::$app->user->id;
        $log->time = time();
        $log->action_id = $this->id;
        $log->action_type = Log::ATTACH_TYPE;

        if ($insert){
            $log->action = Yii::t('main','Created new attach');
        } else {
            $log->action = Yii::t('main','Updated attach');
        }
        $log->save(false);
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'section' => Yii::t('main', 'Section'),
            'parent' => Yii::t('main', 'Parent'),
            'name' => Yii::t('main', 'Name'),
            'guid' => Yii::t('main', 'Guid'),
            'extension' => Yii::t('main', 'Extension'),
            'size' => Yii::t('main', 'Size'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function beforeDelete()
    {
        $file = realpath(dirname(__FILE__)).'/../../'.Yii::$app->params['attach_dir'].$this->guid.'.'.$this->extension;
        if(!is_dir($file) && file_exists($file))
            unlink($file);
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

}