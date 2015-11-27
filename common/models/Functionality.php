<?php

namespace common\models;

use Yii;

use yii\db\Expression;
use yii\db\ActiveRecord;

use yii\behaviors\TimestampBehavior;

use common\models\NonDeletedActiveRecord;

/**
 * This is the model class for table "functionality".
 *
 * @property integer $functionality_id
 * @property resource $description
 * @property string $datetime_added
 * @property integer $deleted
 * @property integer $project_id
 * @property string $name
 * @property integer $creator_id
 * @property string $datetime_updated
 * @property integer $updater_id
 *
 * @property Project $project
 * @property User $creator
 * @property User $updater
 * @property Todo[] $todos
 */
class Functionality extends NonDeletedActiveRecord
{
	public function behaviors() {
		return [ 
				[
        				'class' => TimestampBehavior::className(),
        				'attributes' => [
        						ActiveRecord::EVENT_BEFORE_INSERT => 'datetime_added',
        						ActiveRecord::EVENT_BEFORE_UPDATE => 'datetime_updated',
        				],
        				'value' =>  new Expression('NOW()'),
				],
		];
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'functionality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'deleted', 'project_id', 'name', 'creator_id', 'updater_id', 'amount', 'price'], 'required'],
            [['description'], 'string'],
        	[['price'], 'match', 'pattern' => '/^[0-9]{0,1}(\.[0-9]{0,2})?$/', 'message' => 'Select a price from 0.01 to 9999.99'],
            //[['datetime_added', 'datetime_updated'], 'safe'],
            [['project_id', 'creator_id', 'updater_id', 'amount'], 'integer'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'functionality_id' => 'Functionality ID',
            'description' => 'Description',
            'datetime_added' => 'Datetime Added',
            'deleted' => 'Deleted',
            'project_id' => 'Project ID',
            'name' => 'Name',
            'creator_id' => 'Creator ID',
            'datetime_updated' => 'Datetime Updated',
            'updater_id' => 'Updater ID',
        	'amount' => 'Amount',
        	'price' => 'Price',
        ];
    }
    
    public function delete() {
        $this->deleted = TRUE;
        $this->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['functionality_id' => 'functionality_id']);
    }
}
