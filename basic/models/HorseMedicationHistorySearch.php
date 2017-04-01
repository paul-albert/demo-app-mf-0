<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HorseMedicationHistory;

/**
 * HorseMedicationHistorySearch represents the model behind the search form 
 * of `app\models\HorseMedicationHistory`.
 */
class HorseMedicationHistorySearch extends HorseMedicationHistory {

    public function rules () {
        return [
            [['id', 'horse_id'], 'integer'],
            [['medicament', 'date', 'note'], 'safe'],
        ];
    }

    public function scenarios () {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search ($params) {
        $query = HorseMedicationHistory::find();

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
            'date'  => $this->date,
        ]);

        $query
            ->andFilterWhere(['like', 'medicament', $this->medicament])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
    
}
