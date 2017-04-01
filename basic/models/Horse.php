<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "horse".
 * 
 * @property integer $id
 * @property integer $client_id
 * @property string  $name
 * @property string  $online_number
 * @property string  $birth_date
 * @property string  $sex
 * @property string  $color
 * @property string  $arrival_date
 * @property string  $departure_date
 * @property integer $active
 */
class Horse extends \yii\db\ActiveRecord {

    public static function tableName () {
        return 'horse';
    }

    public function rules () {
        return [
            [['id', 'client_id', 'name', 'online_number', 'birth_date',
                'sex', 'color', 'arrival_date'], 'required'],
            [['client_id', 'departure_date'], 'safe'],
            [['sex'], 'string', 'max' => 10],
            [['color'], 'string', 'max' => 32],
            [['online_number'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 255],
            [['active'], 'integer', 'max' => 1],
            [['id', 'client_id'], 'integer', 'max' => 10],
        ];
    }

    public function attributeLabels () {
        return [
            'id'                => Yii::t('app', 'id'),
            'client_id'         => Yii::t('app', 'Client'),
            'name'              => Yii::t('app', 'HorseName'),
            'online_number'     => Yii::t('app', 'Online number'),
            'birth_date'        => Yii::t('app', 'Birth date'),
            'sex'               => Yii::t('app', 'Sex'),
            'color'             => Yii::t('app', 'Color'),
            'arrival_date'      => Yii::t('app', 'Arrival date'),
            'departure_date'    => Yii::t('app', 'Departure date'),
            'active'            => Yii::t('app', 'Active'),
        ];
    }

    public function getClient () {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }
    
    public function getHistories () {
        return $this->hasMany(HorseMedicationHistory::className(), ['horse_id' => 'id']);
    }

    public function getPlaces () {
        return $this->hasMany(HorsePlace::className(), ['horse_id' => 'id']);
    }

    public function getServices () {
        return $this->hasMany(HorseService::className(), ['horse_id' => 'id']);
    }

    public static function getHorseList () {
        return ArrayHelper::map(Horse::find()->select('id, name')->all(),
                                'id', 'name');
    }

    public function getSexList () {
        return [
            'm' => Yii::t('app', 'Male'),
            'f' => Yii::t('app', 'Female'),
        ];
    }

}
