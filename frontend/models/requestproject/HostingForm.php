<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class HostingForm extends Model {

	public $information;
	public $selectedBidPart;
	
	public function rules() {
		return [		
			[['selectedBidPart'], 'required'],
			[['information'], 'safe'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'information' => 'Hosting informatie'
		];
	}
}