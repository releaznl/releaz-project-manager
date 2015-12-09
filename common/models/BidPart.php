<?php

namespace common\models;

use Yii;

use common\components\db\ReleazActiveRecord;
use common\models\Functionality;

/**
 * This is the model class for table "bid_part".
 *
 * @property integer $id
 * @property string $name
 * @property integer $bid_category_id
 * @property string $description
 * @property string $price
 * @property integer $file_upload
 * @property integer $explanation
 * @property integer $order
 * @property integer $created_by
 * @property string $datetime_added
 * @property integer $updated_by
 * @property string $datetime_updated
 * @property integer $deleted
 * @property string $attribute_name
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property BidCategory $bidCategory
 */
class BidPart extends ReleazActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bid_part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'attribute_name'], 'required'],
            [['bid_category_id', 'file_upload', 'explanation', 'ordering', 'creator_id', 'updater_id', 'deleted'], 'integer'],
            [['description'], 'string'],
        	[['attribute_name'], 'match', 'pattern' => '(^\S*$)'],
            [['price'], 'number'],
            [['datetime_added', 'datetime_updated'], 'safe'],
            [['name', 'attribute_name'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        	'attribute_name' => 'Attribute Name',
            'name' => 'Name',
            'bid_category_id' => 'Bid Category ID',
            'description' => 'Description',
            'price' => 'Price',
            'file_upload' => 'File Upload',
            'explanation' => 'Explanation',
            'order' => 'Order',
            'creator_id' => 'Created By',
            'datetime_added' => 'Datetime Added',
            'updater_id' => 'Updated By',
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
    public function getBidCategory()
    {
        return $this->hasOne(BidCategory::className(), ['id' => 'bid_category_id']);
    }
    
    public function saveAsFunctionality($project_id) {
    		
    	$functionality = new Functionality();
    	
    	$functionality->project_id = $project_id;
    	$functionality->name = $this->name;
    	$functionality->price = round($this->price, 2);
    	$functionality->amount = 1;
    	$functionality->description = $this->description;
    	$functionality->deleted = false;
    	
    	if (!$functionality->validate()) {
    		return false;
    	} else {
    		return $functionality->save();
    	}
    }
}
