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
				'parts' => 'Parts',
				'worktogether' => 'Work together',
				'skip' => 'Skip',
				'selection' => 'Selection',
		];
	}
    
    public function getSelectedPart() {
    	return $parts[$selection];
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