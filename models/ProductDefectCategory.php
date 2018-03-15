<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_product_defect_category".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $defect_category_id
 */
class ProductDefectCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_product_defect_category';
    }
    public $main_category,$name,$ch_name,$ch_main_category,$description;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['product_id', 'defect_category_id'], 'unique'],
            [['product_id', 'defect_category_id'], 'unique', 'targetAttribute' => ['product_id', 'defect_category_id'], 'message' => 'Error Message hear'],
            [['product_id', 'defect_category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'defect_category_id' => Yii::t('app', 'Defect Category ID'),
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'defect_category_id']);
    }
}
