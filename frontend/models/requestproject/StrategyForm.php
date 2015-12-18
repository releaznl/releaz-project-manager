<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class StrategyForm extends Model {
	/** var */
	public $samenkijken;
	public $overslaan;
	
	public function rules() {
		return [
				[['samenkijken', 'overslaan'], 'safe'],
		];
	}
	
	public function attributeLabels() {
		return $labels = [
				
		];
	}
	
	public function saveAsFunctionality($project_id) {
		if ($project_id === null || !$this->validate()) {
			return false;
		} else {
			return BidPart::find($this->selection)->one()->saveAsFunctionality($project_id);
		}
	}
	
// 	public function set0() {
// 		foreach ($this->class->bidParts as $part) {
// 			parent::__set( $part->attribute_name, 0);
// 			//$this->{$part->attribute_name} = null;
// 		}
// 	}
	
// 	public function addVar($label, $value) {
// 		$this->{$label} = $value;
// 		var_dump($this); exit;
// 		return $label;
// 	}
}