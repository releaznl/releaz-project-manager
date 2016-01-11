<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_moment".
 *
 * @property integer $id
 * @property string $moment
 * @property integer $customer_id
 * @property string $comment
 * @property integer $creator_id
 * @property integer $updater_id
 * @property string $datetime_added
 * @property string $datetime_updated
 * @property integer $deleted
 *
 * @property User $creator
 * @property Customer $customer
 * @property User $updater
 * @property Meeting[] $meetings
 */
class ContactMoment extends \common\components\db\ReleazActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contact_moment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moment', 'datetime_added', 'datetime_updated'], 'safe'],
            [['customer_id', 'creator_id', 'updater_id', 'deleted'], 'integer'],
            [['comment'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'moment' => Yii::t('app', 'Moment'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'comment' => Yii::t('app', 'Comment'),
            'creator_id' => Yii::t('app', 'Creator ID'),
            'updater_id' => Yii::t('app', 'Updater ID'),
            'datetime_added' => Yii::t('app', 'Datetime Added'),
            'datetime_updated' => Yii::t('app', 'Datetime Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['contact_moment_id' => 'id']);
    }
}
