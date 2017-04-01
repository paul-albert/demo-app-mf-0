<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horse_place".
 *
 * @property integer $id
 * @property integer $horse_id
 * @property string  $box_name
 * @property string  $box_number
 * @property float   $price
 * @property string  $account_type
 * @property string  $contract_number
 */
class HorsePlace extends \yii\db\ActiveRecord {

    public static function tableName () {
        return 'horse_place';
    }

    public function rules () {
        return [
            [['id', 'horse_id', 'box_name', 'box_number', 'price',
                'account_type', 'contract_number'], 'required'],
            [['id', 'horse_id'], 'integer'],
            [['price'], 'safe'],
            [['account_type'], 'string', 'max' => 64],
            [['box_name', 'box_number', 'contract_number'], 
                'string', 'max' => 255],
            [['id', 'horse_id'], 'integer', 'max' => 10],
            [['price'], 'float', 'max' => 1000000.00],
        ];
    }

    public function attributeLabels () {
        return [
            'id'                => Yii::t('app', 'id'),
            'horse_id'          => Yii::t('app', 'Horse'),
            'box_name'          => Yii::t('app', 'Box name'),
            'box_number'        => Yii::t('app', 'Box number'),
            'price'             => Yii::t('app', 'Price'),
            'account_type'      => Yii::t('app', 'Account type'),
            'contract_number'   => Yii::t('app', 'Contract number'),
        ];
    }

    public function getHorse () {
        return $this->hasOne(Horse::className(), ['id' => 'horse_id']);
    }
    
}
