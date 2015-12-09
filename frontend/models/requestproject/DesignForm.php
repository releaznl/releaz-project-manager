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
	public $currentStyle;
	public $targetAudience;
	
	public $targetAudiences = array('10 - 20', '20 - 30', '30 - 45', '45 - 60');

	public function rules() {
		return [
			[['website1', 'website2', 'website3'], 'required',
					'message' => 'Dit is geen valide website'],
			[['goal', 'targetAudience'], 'required'],
			[['currentStyle'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
	
	public function saveAsFunctionality($project_id) {
		// Website 1
		$functionality = new Functionality();
		
		$functionality->price = 0;
		$functionality->amount = 1;
		$functionality->name = 'Website1';
		$functionality->description = $this->website1;
		$functionality->project_id = $project_id;
		$functionality->deleted = 0;
		
		$functionality->save();
		
		// Website 2
		$functionality = new Functionality();
		
		$functionality->price = 0;
		$functionality->amount = 1;
		$functionality->name = 'Website2';
		$functionality->description = $this->website2;
		$functionality->project_id = $project_id;
		$functionality->deleted = 0;
		
		$functionality->save();
		
		// Website 3
		$functionality = new Functionality();
		
		$functionality->price = 0;
		$functionality->amount = 1;
		$functionality->name = 'Website3';
		$functionality->description = $this->website3;
		$functionality->project_id = $project_id;
		$functionality->deleted = 0;
		
		$functionality->save();
		
		// Goal
		$functionality = new Functionality();
		
		$functionality->price = 0;
		$functionality->amount = 1;
		$functionality->name = 'Goal';
		$functionality->description = $this->goal;
		$functionality->project_id = $project_id;
		$functionality->deleted = 0;
		
		$functionality->save();
		
		
		// Current style
		$this->currentStyle = UploadedFile::getInstance($this, 'currentStyle');
		$this->saveFile();
		
		$file = new File();
		
		$file->name = $this->currentStyle->baseName; //. '.' . $this->currentStyle->extension;
		
		$file->validate();
		var_dump($file->getErrors()); exit;
	}
	
	public function saveFile()
	{
		if ($this->validate()) {
			$this->currentStyle->saveAs('uploads/' . $this->currentStyle->baseName . '.' . $this->current_style->extension);
			return true;
		} else {
			return false;
		}
	}
}