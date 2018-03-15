<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Outlet;

/**
 * OutletSearch represents the model behind the search form about `app\models\Outlet`.
 */
class OutletSearch extends Outlet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','outlet_type'], 'integer'],
            [['name'], 'string', 'max' => 255],
            
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
        $query = Outlet::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
        ]);

        $this->load($params);

        /*if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        */

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'location', $this->location])
                ->andFilterWhere(['like', 'contact_no', $this->contact_no])
                ->andFilterWhere(['like', 'outlet_type', $this->outlet_type]);

        return $dataProvider;
    }
}
