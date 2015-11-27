<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_todo".
 *
 * @property integer $todo_id
 * @property integer $user_id
 * @property integer $user_todo_id
 *
 * @property Todo $todo
 * @property User $user
 */
class UserTodo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_todo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['todo_id', 'user_id', 'user_todo_id'], 'required'],
            [['todo_id', 'user_id', 'user_todo_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'todo_id' => Yii::t('app','Todo ID'),
            'user_id' => Yii::t('app','User ID'),
            'user_todo_id' => Yii::t('app','User Todo ID'),
        ];
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
