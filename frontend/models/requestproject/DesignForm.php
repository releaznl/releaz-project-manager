<?php

namespace frontend\models\requestproject;

use Yii;
use yii\base\Model;
use common\models\BidPart;

class DesignForm extends Model {
	
	public $website1;
	public $website2;
	public $website3;
	
	public $goal;
	public $currentStyle;
	public $targetAudience;
	
	public $targetAudiences = array('10 - 20', '20 - 30', '30 - 45', '45 - 60');

	public function rules() {
		return [
			[['website1', 'website2', 'website3'], 'required',
					'message' => 'Dit is geen valide website'],
			[['goal', 'targetAudience'], 'required'],
			[['currentStyle'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
		];
	}

	public function attributeLabels() {
		return $labels = [
				'parts' => 'Parts',
				'website1' => 'De volgende drie websites vind ik mooi als voorbeeld',
				'website2' => 'Website 2',
				'website3' => 'Website 3',
				'goal' => 'Doel van de website',
				'currentStyle' => 'Huidige huisstijl',
				'targetAudience' => 'Doelgroep'
		];
	}
	
	public function saveFile()
	{
		if ($this->validate()) {
			$this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
			return true;
		} else {
			return false;
		}
	}
}