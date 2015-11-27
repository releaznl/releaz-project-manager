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
            [['customer_id', 'address', 'user_id', 'name', 'zip_code', 'email_address'], 'required'],
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
            'customer_id' => Yii::t('app','Customer ID'),
            'user_id' => Yii::t('app','User ID'),
            'name' => Yii::t('app','Name'),
            'address' => Yii::t('app','Address'),
            'zip_code' => Yii::t('app','Zip Code'),
            'location' => Yii::t('app','Location'),
            'phone_number' => Yii::t('app','Phone Number'),
            'website' => Yii::t('app','Website'),
            'kvk' => Yii::t('app','Kvk'),
            'btw' => Yii::t('app','Btw'),
            'email_address' => Yii::t('app','Email Address'),
            'description' => Yii::t('app','Description'),
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
