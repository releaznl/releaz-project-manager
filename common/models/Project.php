<?php

namespace common\models;

use Yii;

use common\models\NonDeletedActiveRecord;

use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\Behavior;
use common\components\db\ReleazActiveRecord;

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
class Project extends ReleazActiveRecord
{
	const STATUS_REQUESTED = 0;
	const STATUS_ACCEPTED = 1;
	const STATUS_FINISHED = 2;
	
	
	
	public static function statusses() {
		return [
				self::STATUS_REQUESTED => Yii::t('project', 'Requested'),
				self::STATUS_ACCEPTED => Yii::t('project', 'Accepted'),
				self::STATUS_FINISHED => Yii::t('project', 'Finished'),
		];
	}
	
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
            [['description', 'deleted', 'projectmanager_id'], 'required'],
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
            'project_id' => Yii::t('project', 'Project ID'),
            'description' => Yii::t('project', 'Description'),
            'datetime_added' => Yii::t('project', 'Datetime Added'),
            'deleted' => Yii::t('project', 'Deleted'),
            'creator_id' => Yii::t('project', 'Creator ID'),
            'client_id' => Yii::t('project', 'Client ID'),
            'projectmanager_id' => Yii::t('project', 'Projectmanager ID'),
            'datetime_updated' => Yii::t('project', 'Datetime Updated'),
            'updater_id' => Yii::t('project', 'Updater ID'),
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
        return $this->hasOne(Customer::className(), ['customer_id' => 'client_id']);
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
