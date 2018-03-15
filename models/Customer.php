<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_defects".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $customer_name
 * @property string $email
 * @property string $address
 * @property string $contact
 * @property integer $status
 * @property integer $i_date
 * @property integer $u_date
 * @property integer $deleted
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_customer';
    }
    public $subject,$email_body;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'email','address','contact',],'required'],
            [['submission_id',], 'integer'],
            [['address','email_body'], 'string'],
            [['email'], 'email'],
            [['subject'],'required','on' => 'email_cus'],
            [['customer_name', 'email'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'), 
            'customer_name' => Yii::t('app', 'Customer Name'),
            'email' => Yii::t('app', 'Email'), 
            'address' => Yii::t('app', 'Address'),
            'contact' => Yii::t('app', 'Phone'), 
            'submission_id' => Yii::t('app', 'Submission id'), 
        ];
    }
}
