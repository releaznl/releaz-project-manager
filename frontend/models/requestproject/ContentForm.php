<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class ContentForm extends Model {
	
	public $content;
	public $comment;
	
	public function rules() {
		return [
			[['content'], 'file', 'skipOnEmpty' => false],
			[['comment'], 'safe'],
		];
	}
	
	public function saveAsFunctionality($project_id) {
		
	}

	public function attributeLabels() {
		return $labels = [
				'content' => 'Inhoud',
				'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}