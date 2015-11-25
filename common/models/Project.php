<?php

namespace common\models;

use Yii;

use common\models\NonDeletedActiveRecord;

/**
 * This is the model class for table "project".
 *
 * @property integer $project_id
 * @property resource $description
 * @property string $datetime_added
 * @property integer $deleted
 * @property integer $creator_id
 * @property integer $client_id
 * @property integer $projectmanager_id
 * @property string $datetime_updated
 * @property integer $updater_id
 *
 * @property File[] $files
 * @property Functionality[] $functionalities
 * @property User $creator
 * @property User $client
 * @property User $projectmanager
 * @property User $updater
 */
class Project extends NonDeletedActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'deleted', 'creator_id', 'client_id', 'projectmanager_id', 'updater_id'], 'required'],
            [['description'], 'string'],
            [['datetime_added', 'datetime_updated'], 'safe'],
            [['deleted', 'creator_id', 'client_id', 'projectmanager_id', 'updater_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'description' => 'Description',
            'datetime_added' => 'Datetime Added',
            'deleted' => 'Deleted',
            'creator_id' => 'Creator ID',
            'client_id' => 'Client ID',
            'projectmanager_id' => 'Projectmanager ID',
            'datetime_updated' => 'Datetime Updated',
            'updater_id' => 'Updater ID',
        ];
    }
    
    public static function find() {
        return parent::find()->where(['deleted' => FALSE]);
    }
    
    public static function findProjectAll() {
        return parent::find();
    }
    
    public static function findProjectOne($id) {
        return parent::find()->where(['project_id' => $id])->one();
    }
    
    public function delete() {
        $this->deleted = TRUE;
        $this->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['project_id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctionalities()
    {
        return $this->hasMany(Functionality::className(), ['project_id' => 'project_id']);
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
    public function getClient()
    {
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectmanager()
    {
        return $this->hasOne(User::className(), ['id' => 'projectmanager_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdater()
    {
        return $this->hasOne(User::className(), ['id' => 'updater_id']);
    }
}
