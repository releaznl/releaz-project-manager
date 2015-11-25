<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

use common\models\Project;

/**
 * ContactForm is the model behind the contact form.
 */
class NewProjectForm extends Model
{
	public $project_description;
	public $client_id;
	public $projectmanager_id;
	
	public $name;
	public $email_address;
	public $password;
	
	public $new_user; // Boolean to check if a new user has to be made
	
	public $address;
	public $zip_code;
	public $location;
	public $phone_number;
    public $website;
    public $kvk;
    public $btw;
    public $description;
    
    public $customer_id;
    public $user_id;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['project_description', 'projectmanager_id'], 'required'],
			[['name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'description', 'email_address'], 'required', 'when' => function($model) {
				return $model->new_user;
			}, 'enableClientValidation' => false],
			[['client_id'], 'required', 'when' => function($model) {
				return !$model->new_user;
			}, 'enableClientValidation' => false],
		];
	}
	
	public function createProject() {
		if ($this->validate()) {
			$project = new Project();
			
			return $project;
		}
		
		return null;
	}
}
