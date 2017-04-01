<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HorseSearch represents the model behind the search form 
 * of `app\models\Horse`.
 */
class HorseSearch extends Horse {

    public function rules () {
        return [
            [['id'], 'integer'],
            [['client_id', 'name', 'online_number', 'birth_date', 'sex',
                'color', 'arrival_date', 'departure_date', 'active'], 'safe'],
        ];
    }

    public function scenarios () {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search ($params) {
        $query = Horse::find();

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

        $query->joinWith('client');

        $query->andFilterWhere([
            'horse.id'          => $this->id,
            'birth_date'        => $this->birth_date,
            'arrival_date'      => $this->arrival_date,
            'departure_date'    => $this->departure_date,
            'sex'               => $this->sex,
            'active'            => $this->active,
        ]);

        $query
            ->andFilterWhere(['like', 'client.name', $this->client_id])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'online_number', $this->online_number])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
