<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class StrategyForm extends Model {
	/** var */
	public $samenkijken;
	
	public function rules() {
		return [
				[['samenkijken'], 'safe'],
		];
	}
}