<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property string  $first_name
 * @property string  $last_name
 * @property string  $city
 * @property string  $zipcode
 * @property string  $street
 * @property string  $additional_address_data
 * @property string  $phone
 * @property string  $mobphone
 * @property string  $fax
 * @property string  $email
 * @property string  $account_type_1,
 * @property string  $owner_1
 * @property string  $account_number_1
 * @property string  $banking_code_1
 * @property string  $account_type_2
 * @property string  $owner_2
 * @property string  $account_number_2
 * @property string  $banking_code_2
 * @property integer open_stall
 * @property integer stall
 * @property integer coupler
 * @property string  $additional_info
 * @property string  $vet
 * @property string  $smith
 */
class Client extends \yii\db\ActiveRecord {
    
    public static function tableName () {
        return 'client';
    }
    
    public function rules () {
        return [
            [['id', 'first_name', 'last_name'], 'required'],
            [['zipcode'], 'string', 'max' => 32],
            [['city', 'phone', 'mobphone', 'fax',
                'account_type_1', 'account_type_2'], 'string', 'max' => 64],
            [['email'], 'string', 'max' => 128],
            [['first_name', 'last_name', 'street', 
                'additional_address_data',
                'owner_1', 'account_number_1', 'banking_code_1',
                'owner_2', 'account_number_2', 'banking_code_2', 
                'vet', 'smith'], 'string', 'max' => 255],
            [['additional_info'], 'string', 'max' => 65535],
            [['open_stall', 'stall', 'coupler'], 'integer', 'max' => 1],
            [['id'], 'integer', 'max' => 10],
        ];
    }
    
    public function attributeLabels () {
        return [
            'id'                        => Yii::t('app', 'id'),
            'first_name'                => Yii::t('app', 'First name'),
            'last_name'                 => Yii::t('app', 'Last name'),
            'city'                      => Yii::t('app', 'City'),
            'zipcode'                   => Yii::t('app', 'Zip code'),
            'street'                    => Yii::t('app', 'Street'),
            'additional_address_data'   => Yii::t('app', 'Additional address data'),
            'phone'                     => Yii::t('app', 'Phone'),
            'mobphone'                  => Yii::t('app', 'Mob.phone'),
            'fax'                       => Yii::t('app', 'Fax'),
            'email'                     => Yii::t('app', 'Email'),
            'account_type_1'            => Yii::t('app', 'Account type 1'),
            'owner_1'                   => Yii::t('app', 'Owner 1'),
            'account_number_1'          => Yii::t('app', 'Account number 1'),
            'banking_code_1'            => Yii::t('app', 'Banking code 1'),
            'account_type_2'            => Yii::t('app', 'Account type 2'),
            'owner_2'                   => Yii::t('app', 'Owner 2'),
            'account_number_2'          => Yii::t('app', 'Account number 2'),
            'banking_code_2'            => Yii::t('app', 'Banking code 2'),
            'open_stall'                => Yii::t('app', 'Open stall'),
            'stall'                     => Yii::t('app', 'Stall'),
            'coupler'                   => Yii::t('app', 'Coupler'),
            'additional_info'           => Yii::t('app', 'Additional info'),
            'vet'                       => Yii::t('app', 'Vet'),
            'smith'                     => Yii::t('app', 'Smith'),
        ];
    }
    
    public function getHorses () {
        return $this->hasMany(Horse::className(), ['client_id' => 'id']);
    }
    
    public static function getClientList () {
        return ArrayHelper::map(Client::find()->select('id, name')->all(),
                                'id', 'name');
    }
    
}