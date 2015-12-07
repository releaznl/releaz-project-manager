<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PlanningForm extends Model {

	public $deadline;
	public $noDeadline;
	public $selection;
	
	public function rules() {
		return [
// 			[['deadline'], 'required', 'when' => function($model) { return $model->noDeadline; }],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'noDeadline' => 'Ik heb geen deadline, maak zelf een planning'
		];
	}
}