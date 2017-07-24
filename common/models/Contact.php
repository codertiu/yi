<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $verifyCode;
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'created_date','email', 'subject', 'body'], 'required'],
            [['body'], 'string'],
            [['email'],'email'],
            ['created_date', 'integer'],
            [['name', 'email', 'subject'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main', 'Name'),
            'email' => Yii::t('main', 'Email'),
            'subject' => Yii::t('main', 'Subject'),
            'body' => Yii::t('main', 'Body'),
            'created_date'=>Yii::t('main', 'Created Date'),
        ];
    }
}
