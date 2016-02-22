<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class PromotionForm extends Model {
	
	public $socialmedia_service;
	public $google_analytics_service;
	public $nieuwsbrief_service;
	public $comment;
	
	public function rules() {
		return [
			[['socialmedia_service', 'google_analytics_service', 'nieuwsbrief_service', 'comment'], 'safe'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'socialmedia_service' => 'Social Media service',
				'google_analytics_service' => 'Google Analytics Service',
				'nieuwsbrief_service' => 'Nieuwsbrief Service',
                                'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}