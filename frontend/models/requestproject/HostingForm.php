<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class HostingForm extends Model {

	public $informatie;
// 	public $al_hosting;
// 	public $wil_hosting;
	public $comment;
	
	public function rules() {
		return [
			[['informatie', 'comment'], 'safe'],
// 			[['al_hosting', 'wil_hosting'], 'safe'],
		];
	}
	
	public function saveAsFunctionality($project_id) {
	
	}

	public function attributeLabels() {
		return $labels = [
				'information' => 'Hosting informatie',
				'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}