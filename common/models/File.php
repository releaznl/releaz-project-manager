<?php

namespace common\models;

use Yii;

use \yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "file".
 *
 * @property integer $file_id
 * @property string $name
 * @property resource $description
 * @property string $datetime_added
 * @property integer $deleted
 * @property integer $creator_id
 * @property integer $todo_id
 * @property integer $project_id
 * @property string $datetime_updated
 * @property integer $updater_id
 *
 * @property Project $project
 * @property Todo $todo
 * @property User $creator
 * @property User $updater
 */
class File extends ActiveRecord
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
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'deleted', 'creator_id', 'updater_id'], 'required'],
            [['file_id', 'deleted', 'creator_id', 'todo_id', 'project_id', 'updater_id'], 'integer'],
            [['description'], 'string'],
            //[['datetime_added', 'datetime_updated'], 'safe'],
            [['name'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'file_id' => 'File ID',
            'name' => 'Name',
            'description' => 'Description',
            'datetime_added' => 'Datetime Added',
            'deleted' => 'Deleted',
            'creator_id' => 'Creator ID',
            'todo_id' => 'Todo ID',
            'project_id' => 'Project ID',
            'datetime_updated' => 'Datetime Updated',
            'updater_id' => 'Updater ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['project_id' => 'project_id']);
    }

    public function delete() {
        $this->deleted = TRUE;
        $this->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodo()
    {
        return $this->hasOne(Todo::className(), ['todo_id' => 'todo_id']);
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
