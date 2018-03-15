<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Defect;

/**
 * DefectSearch represents the model behind the search form about `app\models\Defect`.
 */
class DefectSearch extends Defect
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status', 'initial_date', 'updated_date','defect_no'], 'integer'],
            [[  'outlet_name', ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Defect::find();
        //$query->where(['deleted'=>0]);

        // echo Yii::$app->user->identity->user_type; die;
       // if(Yii::$app->user->identity->user_type==2)
         //   $query->where(['user_id'=>Yii::$app->user->identity->id]);            

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'defect_no' => $this->defect_no,
            'status' => $this->status,
            'initial_date' => $this->initial_date,
            'updated_date' => $this->updated_date,
            //'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(
            ['like', 'customer_id', $this->customer_id])
            // ->andFilterWhere(['like', 'email', $this->email])
            // ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'outlet_name', $this->outlet_name])
            // ->andFilterWhere(['like', 'contact', $this->contact])
            ;

        return $dataProvider;
    }
}
