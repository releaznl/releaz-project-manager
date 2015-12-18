<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;
// TODO attributeLabels laten ophalen uit de database

class StrategyForm extends Model {
	/** var */
	public $samenkijken;
	
	public function rules() {
		return [
				[['samenkijken'], 'safe'],
		];
	}
	
	public function attributeLabels() {
		return $labels = [
				
		];
	}
}