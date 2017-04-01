<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horse_service".
 *
 * @property integer $id
 * @property integer $horse_id
 * @property integer $active
 * @property string  $service_name
 * @property string  $performed_by
 * @property string  $start_date
 * @property string  $end_date
 * @property float   $price
 * @property string  $account_type
 * @property string  $contract_number
 */
class HorseService extends \yii\db\ActiveRecord {

    public static function tableName () {
        return 'horse_service';
    }

    public function rules () {
        return [
            [['id', 'horse_id', 'active', 'service_name',
                'price', 'account_type'], 'required'],
            [['id', 'horse_id', 'active'], 'integer'],
            [['price'], 'safe'],
            [['account_type'], 'string', 'max' => 64],
            [['service_name', 'performed_by', 'contract_number'], 
                'string', 'max' => 255],
            [['active'], 'integer', 'max' => 1],
            [['id', 'horse_id'], 'integer', 'max' => 10],
            [['price'], 'float', 'max' => 1000000.00],
        ];
    }

    public function attributeLabels () {
        return [
            'id'                => Yii::t('app', 'id'),
            'horse_id'          => Yii::t('app', 'Horse'),
            'active'            => Yii::t('app', 'Active'),
            'service_name'      => Yii::t('app', 'Service name'),
            'performed_by'      => Yii::t('app', 'Performed by'),
            'start_date'        => Yii::t('app', 'Start date'),
            'end_date'          => Yii::t('app', 'End date'),
            'price'             => Yii::t('app', 'Price'),
            'account_type'      => Yii::t('app', 'Account type'),
            'contract_number'   => Yii::t('app', 'Contract number'),
        ];
    }

    public function getHorse () {
        return $this->hasOne(Horse::className(), ['id' => 'horse_id']);
    }
    
}
