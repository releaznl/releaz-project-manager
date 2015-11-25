<?php

namespace common\models;

use Yii;

class NonDeletedActiveRecord extends yii\db\ActiveRecord {
	
	public static function findNonDeleted($param) {
		return parent::find()->where(['and', ['deleted' => false], $param]);
	}
}