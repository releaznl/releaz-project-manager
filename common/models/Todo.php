<?php

namespace common\models;

use Yii;

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
class Todo extends \yii\db\ActiveRecord
{
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
            'todo_id' => 'Todo ID',
            'name' => 'Name',
            'description' => 'Description',
            'datetime_added' => 'Datetime Added',
            'deleted' => 'Deleted',
            'status_id' => 'Status ID',
            'creator_id' => 'Creator ID',
            'functionality_id' => 'Functionality ID',
            'datetime_updated' => 'Datetime Updated',
            'updater_id' => 'Updater ID',
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
