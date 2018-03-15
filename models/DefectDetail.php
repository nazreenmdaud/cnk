<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_defects_details".
 *
 * @property integer $id
 * @property integer $defect_product_id
 * @property integer $defect_id
 * @property string $image
 * @property string $notes
 * @property integer $status
 * @property integer $deleted
 */
class DefectDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_defects_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['defect_product_id', 'defect_id', 'status'], 'integer'],
            [['notes'], 'string'],
            [['what_done_for_repair'],'required','on' => 'add_update'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'defect_product_id' => Yii::t('app', 'Defect Product ID'),
            'defect_id' => Yii::t('app', 'Defect ID'),
            'image' => Yii::t('app', 'Image'),
            'notes' => Yii::t('app', 'Notes'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
