<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property integer $user_id
 * @property string $name
 * @property string $address
 * @property string $zip_code
 * @property string $location
 * @property string $phone_number
 * @property string $website
 * @property string $kvk
 * @property string $btw
 * @property string $email_address
 * @property resource $description
 *
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['address', 'user_id', 'name', 'zip_code', 'email_address'], 'required'],
            [['customer_id', 'user_id'], 'integer'],
            [['description'], 'string'],
        	[['email_address'], 'email'],
            [['name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'email_address'], 'string', 'max' => 128]
        ];
    }
    
    public function scenarios() {
    	$scenarios = parent::scenarios();
    	$scenarios['createProject'] = [];
    	return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => Yii::t('user','Customer ID'),
            'user_id' => Yii::t('user','User ID'),
            'name' => Yii::t('user','Name'),
            'address' => Yii::t('user','Address'),
            'zip_code' => Yii::t('user','Zip Code'),
            'location' => Yii::t('user','Location'),
            'phone_number' => Yii::t('user','Phone Number'),
            'website' => Yii::t('user','Website'),
            'kvk' => Yii::t('user','Kvk'),
            'btw' => Yii::t('user','Btw'),
            'email_address' => Yii::t('user','Email Address'),
            'description' => Yii::t('user','Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
