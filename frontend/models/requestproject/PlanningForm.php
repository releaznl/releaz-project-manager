<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PlanningForm extends Model {

	public $deadline;
	public $hasDeadline;
	
	public function rules() {
		return [
			[['deadline', 'hasDeadline'], 'safe'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'deadline' => 'Mijn deadline',
				'hasDeadline' => 'Ik heb geen deadline, maak zelf een planning',
		];
	}
}