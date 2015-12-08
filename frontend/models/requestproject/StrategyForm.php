<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class StrategyForm extends Model {
	/** var */
	public $selection;
	
	public function rules() {
		return [
				[['selection'], 'required'],
		];
	}
	
	public function attributeLabels() {
		return $labels = [
				'selection' => 'Selection',
		];
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