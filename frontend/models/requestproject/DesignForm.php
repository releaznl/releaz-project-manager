<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\BidPart;
use common\models\Functionality;
use common\models\File;

class DesignForm extends Model {
	
	public $website1;
	public $website2;
	public $website3;
	
	public $goal;
	/**
     * @var UploadedFile
     */
	public $current_style;
	public $target_audience;

	public function rules() {
		return [
			[['website1'], 'required',
					'message' => 'Dit is geen valide website'],
			[['goal', 'target_audience'], 'required'],
			[['current_style'], 'image', 'skipOnEmpty' => true],
			[['website2', 'website3'], 'safe'],
		];
	}
	
	public function getTargetAudiences() {
		return array('10 - 20', '20 - 30', '30 - 45', '45 - 60');
	}

	public function attributeLabels() {
		return $labels = [
				'parts' => 'Parts',
				'website1' => 'De volgende drie websites vind ik mooi als voorbeeld',
				'website2' => 'Website 2',
				'website3' => 'Website 3',
				'goal' => 'Doel van de website',
				'current_style' => 'Huidige huisstijl',
				'target_audience' => 'Doelgroep'
		];
	}
}