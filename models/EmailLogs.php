<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_email_logs".
 *
 * @property integer $id
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $status
 * @property string $i_date
 */
class EmailLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_email_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['initial_date'], 'safe'],
            [['email', 'subject'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'To'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Email body'),
            'status' => Yii::t('app', 'Status'),
            'initial_date' => Yii::t('app', 'Date Sent'),
        ];
    }
}
