<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PlanningForm extends Model {

	public $deadline;
	
	public function rules() {
		return [
			[['deadline'], 'safe'],
		];
	}
	
	public function saveAsFunctionality($project_id) {
		
	}

	public function attributeLabels() {
		return $labels = [
				'deadline' => 'Mijn deadline',
		];
	}
}