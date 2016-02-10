<?php

namespace common\models;

use Yii;

use yii\db\Expression;
use yii\db\ActiveRecord;

use yii\behaviors\TimestampBehavior;

use common\components\db\ReleazActiveRecord;

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
class Functionality extends ReleazActiveRecord
{
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
            [['description', 'project_id', 'name', 'amount', 'price'], 'required'],
            [['description'], 'string'],
        	[['price'], 'match', 'pattern' => '/^[0-9]{0,9}(\,|\.)[0-9]{0,4}$/', 'message' => 'Select a price from 0,0001 to 999999999,9999'],
            [['project_id', 'creator_id', 'updater_id', 'amount'], 'integer'],
            [['monthly_costs'], 'safe'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'functionality_id' => Yii::t('functionality','Functionality ID'),
            'description' => Yii::t('functionality','Description'),
            'datetime_added' => Yii::t('functionality','Datetime Added'),
            'deleted' => Yii::t('functionality','Deleted'),
            'project_id' => Yii::t('functionality','Project ID'),
            'name' => Yii::t('functionality','Name'),
            'creator_id' => Yii::t('functionality','Creator ID'),
            'datetime_updated' => Yii::t('functionality','Datetime Updated'),
            'updater_id' => Yii::t('functionality','Updater ID'),
        	'amount' => Yii::t('functionality','Amount'),
        	'price' => Yii::t('functionality','Price'),
            'monthly_costs' => Yii::t('functionality','Maandelijkse kosten'),
        ];
    }
    
    public function getTotalPrice() {
    	return $this->price * $this->amount;
    }

    public function getTodoAmount() {
    	return Todo::find('deleted = false')->andWhere('functionality_id = ' . $this->functionality_id)->count();
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
