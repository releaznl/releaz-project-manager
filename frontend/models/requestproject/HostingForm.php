<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class HostingForm extends Model {

	public $hostingInfo;
	public $selectedOption;
	
	public function rules() {
		return [		
			[['selectedOption'], 'required'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'hostingInfo' => 'Hosting informatie'
		];
	}
}