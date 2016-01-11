<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property integer $id
 * @property integer $contact_moment_id
 * @property string $moment
 * @property string $comment
 * @property integer $creator_id
 * @property integer $updater_id
 * @property string $datetime_added
 * @property string $datetime_updated
 * @property integer $deleted
 *
 * @property ContactMoment $contactMoment
 * @property User $creator
 * @property User $updater
 */
class Meeting extends \common\components\db\ReleazActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contact_moment_id', 'creator_id', 'updater_id', 'deleted'], 'integer'],
            [['moment', 'datetime_added', 'datetime_updated'], 'safe'],
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
            'contact_moment_id' => Yii::t('app', 'Contact Moment'),
            'moment' => Yii::t('app', 'Moment'),
            'comment' => Yii::t('app', 'Comment'),
            'creator_id' => Yii::t('app', 'Creator'),
            'updater_id' => Yii::t('app', 'Updater'),
            'datetime_added' => Yii::t('app', 'Datetime Added'),
            'datetime_updated' => Yii::t('app', 'Datetime Updated'),
            'deleted' => Yii::t('app', 'Deleted'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactMoment()
    {
        return $this->hasOne(ContactMoment::className(), ['id' => 'contact_moment_id']);
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
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }
}
