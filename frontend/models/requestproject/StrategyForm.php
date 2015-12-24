<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class StrategyForm extends Model {
	/** var */
	public $samenkijken;
	public $comment;
	
	public function rules() {
		return [
				[['samenkijken', 'comment'], 'safe'],
		];
	}
	
	public function attributeLabels() {
		return [
				'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}