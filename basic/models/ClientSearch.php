<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Client;

/**
 * ClientSearch represents the model behind the search form 
 * of `app\models\Client`.
 */
class ClientSearch extends Client
{

    public function rules () {
        return [
            [['id'], 'integer'],
            [['first_name', 'last_name'], 'safe'],
        ];
    }

    public function scenarios () {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search ($params) {
        $query = Client::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want 
            // to return any records when validation fails:
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name]);

        return $dataProvider;
    }
    
}
