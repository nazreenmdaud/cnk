<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_defect_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $ch_name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_defect_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name','unique'],
            [['name', 'ch_name','main_category','description'], 'string', 'max' => 255],
            [['name', 'main_category'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Defect Name'),
            'ch_name' => Yii::t('app', 'Ch Name'),
            'main_category' => Yii::t('app', 'Category'),
            'ch_main_category' => Yii::t('app', 'Ch Category Name'),
            'description'=> Yii::t('app', 'Description'),
        ];
    }
}
