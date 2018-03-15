<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_images".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $defect_id
 * @property string $images
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'defect_id'], 'integer'],
            [['images'], 'string', 'max' => 255],
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
            'defect_id' => Yii::t('app', 'Defect ID'),
            'images' => Yii::t('app', 'Images'),
        ];
    }
}
