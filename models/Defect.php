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
 * @property integer $initial_date
 * @property integer $updated_date
 * @property integer $deleted
 */
class Defect extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_defects';
    }
    public $subject,$email_body,$email,$contact, $sms_body;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outlet_name','customer_id'],'required'],
            [['user_id', 'status','defect_no','contact' ], 'integer'],
            [['email_body'], 'string'],
            // [['email'], 'email'],
            [['subject'],'required','on' => 'email_cus'],
            [['contact','sms_body'],'required','on' => 'message_cus'],
            // [['customer_name', 'email'], 'string', 'max' => 255],
             //[['contact'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            // 'customer_name' => Yii::t('app', 'Customer Name'),
            'email' => Yii::t('app', 'To'),
            'defect_no'=> Yii::t('app', 'Defect ID'),
            // 'address' => Yii::t('app', 'Address'),
             'contact' => Yii::t('app', 'Contact No'),
            'status' => Yii::t('app', 'Status'),
            'customer_id'=>'Customer id',
            'initial_date' => Yii::t('app', 'Created On'),
            'updated_date' => Yii::t('app', 'Last Updated On'),
            'u_by' => Yii::t('app', 'Last Updated By'),
            // 'deleted' => Yii::t('app', 'Deleted'),
        ];
    }
    
     public function getCustomer() {
                return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
        }
        
        public function getCustomerName() {
                return $this->customer->customer_name;
        }
}
