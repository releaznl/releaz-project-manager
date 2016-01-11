<?php

namespace common\models;

use Yii;

use \yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\base\Behavior;

use common\components\db\ReleazActiveRecord;

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
class File extends ReleazActiveRecord
{
	
	public $uploaded_file;
	
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
        	[['uploaded_file'], 'file', 'skipOnEmpty' => true],
            [['name', 'description'], 'required'],
            [['file_id', 'deleted', 'creator_id', 'todo_id', 'project_id', 'updater_id'], 'integer'],
            [['description'], 'string'],
            //[['datetime_added', 'datetime_updated'], 'safe'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        	'file' => Yii::t('file', 'File'),
            'file_id' => Yii::t('file','File ID'),
        	'uploaded_file' => Yii::t('file', 'Uploaded file'),
            'name' => Yii::t('file','Name'),
            'description' => Yii::t('file','Description'),
            'datetime_added' => Yii::t('file','Datetime Added'),
            'deleted' => Yii::t('file','Deleted'),
            'creator_id' => Yii::t('file','Creator ID'),
            'todo_id' => Yii::t('file','Todo ID'),
            'project_id' => Yii::t('file','Project ID'),
            'datetime_updated' => Yii::t('file','Datetime Updated'),
            'updater_id' => Yii::t('file','Updater ID'),
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
