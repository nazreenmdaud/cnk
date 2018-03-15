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
class Outlet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_outlet';
    }
    //public $subject,$email_body,$email;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','location'],'required'],
            [['contact_no', 'outlet_type'], 'integer'],
            ['email', 'string', 'max' => 255],
            [['email'],'email'],
            
            ['email', 'unique'],
            
            // [['customer_name', 'email'], 'string', 'max' => 255],
            // [['contact'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'), 
            'name' => Yii::t('app', 'Outlet Name'),
            'email' => Yii::t('app', 'Email'),  
            'location'=>'Location',  
            'contact_no'=>'Contact No',
            'outlet_type'=>'Store Type'
        ];
    }
    
    
    
    //  public function getCustomer() {
    //             return $this->hasOne(Customer::className(), ['id' => 'location']);
    //     }
        
    //     public function getCustomerName() {
    //             return $this->customer->customer_name;
    //     }
}
