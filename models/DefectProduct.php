<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_defect_products".
 *
 * @property integer $id
 * @property string $product_name
 * @property integer $defect_id
 * @property integer $status
 * @property integer $deleted
 */
class DefectProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_defect_products';
    }
  public $deleted ;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['defect_id', 'status',], 'integer'],
            [['product_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'defect_id' => Yii::t('app', 'Defect ID'),
            'status' => Yii::t('app', 'Status'), 
        ];
    }
}
