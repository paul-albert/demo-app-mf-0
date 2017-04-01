<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorsePlace;

/**
 * HorsePlaceSearch represents the model behind the search form 
 * of `app\models\HorsePlace`.
 */
class HorsePlaceSearch extends HorsePlace {

    public function rules () {
        return [
            [['id', 'horse_id'], 'integer'],
            [['box_name', 'box_number', 'price',
                'account_type', 'contract_number'], 'safe'],
        ];
    }

    public function scenarios () {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search ($params) {
        $query = HorsePlace::find();

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

        $query->joinWith('horse');

        // grid filtering conditions
        $query->andFilterWhere([
            'id'    => $this->id,
            'price' => $this->price,
        ]);

        $query
            ->andFilterWhere(['like', 'box_name', $this->box_name])
            ->andFilterWhere(['like', 'box_number', $this->box_number])
            ->andFilterWhere(['like', 'account_type', $this->account_type])
            ->andFilterWhere(['like', 'contract_number', 
                $this->contract_number]);

        return $dataProvider;
    }
    
}
