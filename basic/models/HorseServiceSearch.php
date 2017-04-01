<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorseService;

/**
 * HorseServiceSearch represents the model behind the search form 
 * of `app\models\HorseService`.
 */
class HorseServiceSearch extends HorseService {

    public function rules () {
        return [
            [['id', 'horse_id', 'active'], 'integer'],
            [['service_name', 'price', 'account_type'], 'safe'],
        ];
    }

    public function scenarios () {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search ($params) {
        $query = HorseService::find();

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
            'id'            => $this->id,
            'price'         => $this->price,
            'active'        => $this->active,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
        ]);

        $query
            ->andFilterWhere(['like', 'service_name', $this->service_name])
            ->andFilterWhere(['like', 'performed_by', $this->performed_by])
            ->andFilterWhere(['like', 'account_type', $this->account_type])
            ->andFilterWhere(['like', 'contract_number', 
                $this->contract_number]);

        return $dataProvider;
    }
    
}
