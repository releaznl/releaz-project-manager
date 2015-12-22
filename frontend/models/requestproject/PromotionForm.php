<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PromotionForm extends Model {
	
	public $socialmedia_service;
	public $google_analytics_service;
	public $nieuwsbrief_service;
	
	public function rules() {
		return [
			[['socialmedia_service', 'google_analytics_service', 'nieuwsbrief_service'], 'safe'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'socialmedia_service' => 'SocialMedia service',
				'google_analytics_service' => 'Google Analytics Service',
				'nieuwsbrief_service' => 'Nieuwsbrief Service',
		];
	}
}