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
 * @property boolean $monthly_costs
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
            [['datetime_added', 'datetime_updated', 'monthly_costs'], 'safe'],
            [['name', 'attribute_name'], 'string', 'max' => 125]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' 				=> \Yii::t('bidPart','ID'),
        	'attribute_name'	=> \Yii::t('bidPart','Attribute Name'),
            'name' 				=> \Yii::t('bidPart','Name'),
            'bid_category_id' 	=> \Yii::t('bidPart','Bid Category ID'),
            'description'		=> \Yii::t('bidPart','Description'),
            'price' 			=> \Yii::t('bidPart','Price'),
            'file_upload' 		=> \Yii::t('bidPart','File Upload'),
            'explanation' 		=> \Yii::t('bidPart','Explanation'),
        	'monthly_costs' 	=> \Yii::t('bidPart','Monthly costs'),
            'order' 			=> \Yii::t('bidPart','Order'),
            'creator_id' 		=> \Yii::t('bidPart','Created By'),
            'datetime_added' 	=> \Yii::t('bidPart','Datetime Added'),
            'updater_id' 		=> \Yii::t('bidPart','Updated By'),
            'datetime_updated' 	=> \Yii::t('bidPart','Datetime Updated'),
            'deleted' 			=> \Yii::t('bidPart','Deleted'),
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
