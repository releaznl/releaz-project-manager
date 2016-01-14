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
 * @property int $contact_type
 * @property string $contact
 *
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
	const CONTACT_EMAIL = 0;
	const CONTACT_PHONE = 1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }
    
    /**
     * 
     * @return array
     */
    public static function getContactTypes() 
    {
    	return [
    			self::CONTACT_EMAIL => Yii::t('user', 'Contact via Email'),
    			self::CONTACT_PHONE => Yii::t('user', 'Contact via Phone'),
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        
        return [
            [['address', 'name', 'zip_code', 'email_address'], 'required'],
            [['customer_id',  'user_id', 'user_id', 'contact_type'], 'integer'],
        	[['email_address'], 'email'],
            [['name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'email_address', 'contact'], 'string', 'max' => 128]
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
            'customer_id' 	=> Yii::t('user','Customer ID'),
            'user_id' 		=> Yii::t('user','User ID'),
            'name' 			=> Yii::t('user','Name'),
            'address' 		=> Yii::t('user','Address'),
            'contact_type' 	=> Yii::t('user','Contact type'),
        	'contact' 		=> Yii::t('customer', 'contact'),
            'zip_code' 		=> Yii::t('user','Zip Code'),
            'location' 		=> Yii::t('user','Location'),
            'phone_number' 	=> Yii::t('user','Phone Number'),
            'website' 		=> Yii::t('user','Website'),
            'kvk' 			=> Yii::t('user','Kvk'),
            'btw' 			=> Yii::t('user','Btw'),
            'email_address' => Yii::t('user','Email Address'),
        ];
    }
    
    public function getContactType() 
    {
    	return $this->getContactTypes()[$this->contact_type];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getContactMoments() {
    	return $this->hasMany(ContactMoment::className(), ['customer_id' => 'customer_id']);
    }
}
