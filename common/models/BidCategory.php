<?php

namespace common\models;

use Yii;
use common\components\db\ReleazActiveRecord;

/**
 * This is the model class for table "bid_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $order
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
            [['name', 'order'], 'required'],
            [['order', 'creator_id', 'updater_id', 'deleted'], 'integer'],
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
            'order' => 'Order',
            'description' => 'Description',
            'created_by' => 'Created By',
            'datetime_added' => 'Datetime Added',
            'updated_by' => 'Updated By',
            'datetime_updated' => 'Datetime Updated',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidParts()
    {
        return $this->hasMany(BidPart::className(), ['bid_category_id' => 'id']);
    }
}
