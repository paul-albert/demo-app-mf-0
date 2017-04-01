<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horse_medication_history".
 *
 * @property integer $id
 * @property integer $horse_id
 * @property string  $medicament
 * @property string  $date
 * @property string  $note
 */
class HorseMedicationHistory extends \yii\db\ActiveRecord {

    public static function tableName () {
        return 'horse_medication_history';
    }

    public function rules () {
        return [
            [['id', 'horse_id', 'medicament', 'date', 'note'], 'required'],
            [['id', 'horse_id'], 'integer'],
            [['date'], 'safe'],
            [['medicament'], 'string', 'max' => 255],
            [['id', 'horse_id'], 'integer', 'max' => 10],
        ];
    }

    public function attributeLabels () {
        return [
            'id'            => Yii::t('app', 'id'),
            'horse_id'      => Yii::t('app', 'Horse'),
            'medicament'    => Yii::t('app', 'Medicament'),
            'date'          => Yii::t('app', 'Date'),
            'note'          => Yii::t('app', 'Note'),
        ];
    }

    public function getHorse () {
        return $this->hasOne(Horse::className(), ['id' => 'horse_id']);
    }
    
}
