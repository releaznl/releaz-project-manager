<?php

namespace common\models;

use Yii;

use \yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "todo".
 *
 * @property integer $todo_id
 * @property string $name
 * @property resource $description
 * @property string $datetime_added
 * @property integer $deleted
 * @property integer $status_id
 * @property integer $creator_id
 * @property integer $functionality_id
 * @property string $datetime_updated
 * @property integer $updater_id
 *
 * @property File[] $files
 * @property Functionality $functionality
 * @property User $creator
 * @property User $updater
 * @property UserTodo[] $userTodos
 */
class Todo extends ActiveRecord
{
	public function behaviors() {
		return [
				[
						'class' => TimestampBehavior::className(),
						'attributes' => [
								ActiveRecord::EVENT_BEFORE_INSERT => ['datetime_added', 'datetime_updated'],
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
        return 'todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'deleted', 'status_id', 'creator_id', 'functionality_id', 'updater_id'], 'required'],
            [['todo_id', 'deleted', 'status_id', 'creator_id', 'functionality_id', 'updater_id'], 'integer'],
            [['description'], 'string'],
            // [['datetime_added', 'datetime_updated'], 'safe'],
            [['name'], 'string', 'max' => 128]
        ];
    }
    
    public function delete() {
        $this->deleted = TRUE;
        $this->save();
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'todo_id' => Yii::t('todo','Todo ID'),
            'name' => Yii::t('todo','Name'),
            'description' => Yii::t('todo','Description'),
            'datetime_added' => Yii::t('todo','Datetime Added'),
            'deleted' => Yii::t('todo','Deleted'),
            'status_id' => Yii::t('todo','Status ID'),
            'creator_id' => Yii::t('todo','Creator ID'),
            'functionality_id' => Yii::t('todo','Functionality ID'),
            'datetime_updated' => Yii::t('todo','Datetime Updated'),
            'updater_id' => Yii::t('todo','Updater ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['todo_id' => 'todo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctionality()
    {
        return $this->hasOne(Functionality::className(), ['functionality_id' => 'functionality_id']);
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
    public function getUserTodos()
    {
        return $this->hasMany(UserTodo::className(), ['todo_id' => 'todo_id']);
    }
}
