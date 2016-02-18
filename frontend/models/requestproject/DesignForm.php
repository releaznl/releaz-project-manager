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
	public $comment;

	public function rules() {
		return [
			[['website1'], 'required',
					'message' => 'Dit is geen valide website'],
			[['goal', 'target_audience'], 'required'],
			[['current_style'], 'file', 'skipOnEmpty' => true, 'mimeTypes' => ['application/pdf', 'application/msword', 'application/vnd.oasis.opendocument.text', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']],
			[['website2', 'website3', 'comment'], 'safe'],
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
				'target_audience' => 'Doelgroep',
				'comment' => \Yii::t('request-project', 'Comment'),
		];
	}
}