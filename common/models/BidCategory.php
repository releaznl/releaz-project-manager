<?php

namespace common\models;

use Yii;
use common\components\db\ReleazActiveRecord;

/**
 * This is the model class for table "bid_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $ordering
 * @property string $description
 * @property integer $created_by
 * @property string $datetime_added
 * @property integer $updated_by
 * @property string $datetime_updated
 * @property integer $deleted
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property BidPart[] $bidParts
 */
class BidCategory extends ReleazActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bid_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ordering'], 'required'],
            [['creator_id', 'updater_id', 'deleted'], 'integer'],
            [['description'], 'string'],
            [['datetime_added', 'datetime_updated'], 'safe'],
            [['name'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'ordering' => 'Order',
            'description' => 'Description',
            'creator_id' => 'Created By',
            'datetime_added:datetime' => 'Datetime Added',
            'updater_id' => 'Updated By',
            'datetime_updated:datetime' => 'Datetime Updated',
            'deleted:boolean' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidParts()
    {
        return $this->hasMany(BidPart::className(), ['bid_category_id' => 'id']);
    }
}
