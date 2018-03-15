<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prd_products".
 *
 * @property integer $id
 * @property string $name
 * @property string $ch_name
 * @property integer $deleted
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prd_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['deleted'], 'integer'],
            [['name', 'ch_name'], 'string', 'max' => 255],
            [['name','ch_name'],'required'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'ch_name' => Yii::t('app', 'Chinese Name'),
            
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    


}
