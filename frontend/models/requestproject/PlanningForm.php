<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PlanningForm extends Model {

	public $deadline;
	public $comment;
	
	public function rules() {
		return [
			[['deadline', 'comment'], 'safe'],
		];
	}
	
	public function saveAsFunctionality($project_id) {
		
	}

	public function attributeLabels() {
		return $labels = [
				'deadline' => 'Mijn deadline',
				'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}