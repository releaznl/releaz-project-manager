<?php

namespace common\components\db;

use Yii;
use yii\behaviors\TimestampBehavior;

use yii\db\ActiveRecord;
use yii\db\Expression;

use common\components\behaviors\CreatedUpdatedBehavior;;
use common\components\behaviors\DeletedBehavior;

class ReleazActiveRecord extends \yii\db\ActiveRecord {
	
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
			[
				'class' => CreatedUpdatedBehavior::className(),
				'attributes' => [
						ActiveRecord::EVENT_BEFORE_INSERT => ['creator_id', 'updater_id'],
						ActiveRecord::EVENT_BEFORE_UPDATE => 'updater_id',
				],
			],
			[
				'class' => DeletedBehavior::className(),
			],
		];
	}
	
	public function delete() {
		$this->deleted = true;
		$this->save();
	}
	
	public static function findNonDeleted($param) {
		return parent::find()->where(['and', ['deleted' => false], $param]);
	}
}