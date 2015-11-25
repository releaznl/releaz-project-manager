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
            [['customer_id', 'user_id', 'name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'email_address', 'description'], 'required'],
            [['customer_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'email_address'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'address' => 'Address',
            'zip_code' => 'Zip Code',
            'location' => 'Location',
            'phone_number' => 'Phone Number',
            'website' => 'Website',
            'kvk' => 'Kvk',
            'btw' => 'Btw',
            'email_address' => 'Email Address',
            'description' => 'Description',
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
