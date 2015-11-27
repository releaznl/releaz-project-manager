<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

use common\models\Project;
use common\models\User;
use common\models\Customer;

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
	
	public $new_user;
	
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
    
    public $project_id;

    function NewProjectForm() {
    	$new_user = true;
    }
    
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['project_description', 'projectmanager_id'], 'required'],
				
			[['new_user'], 'boolean'],
				
			[['name', 'password', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'description', 'email_address'], 'required', 'when' => function($model) {
				return $model->new_user == true;
			}, 'enableClientValidation' => true, 
			'whenClient' => "function (attribute, value) { return $('#newprojectform-new_user').val(); }"
			],
			
			[['client_id'], 'required', 'when' => function($model) {
				return $model->new_user == false;
			}, 'enableClientValidation' => true,
			'whenClient' => "function (attribute, value) { return !$('#newprojectform-new_user').val(); }"
			],
		];
	}
	
	public function save() {
		if ($this->validate()) {
			
			$user;
			
			if ($this->new_user) {
				$user = new User();
				
				$user->username = $this->name;
				$user->email = $this->email;
				$user->setPassword($this->password);
				$user->generateAuthKey();
				
				if ($user->save()) {
					$customer = new Customer();
						
					$customer->name = $this->name;
					$customer->location = $this->location;
					$customer->address = $this->address;
					$customer->zip_code = $this->zip_code;
					$customer->phone_number = $this->phone_number;
					$customer->website = $this->website;
					$customer->kvk = $this->kvk;
					$customer->btw = $this->btw;
					$customer->email_address = $this->email;
					$customer->description = $this->description;
					
					$customer->user_id = $user->id;
					
					if (!$customer->save()) {
						return null;
					}
				}
			}
			
			$project = new Project();
			$project->description = $this->project_description;
			$project->deleted = false;
			$project->creator_id = Yii::$app->user->id;
			$project->projectmanager_id = $this->projectmanager_id;
			$project->updater_id = Yii::$app->user->id;
			
			if ($this->new_user) {
				$project->client_id = $user->id;
			} else {
				$project->client_id = $this->client_id;
			}
			$bool = $project->save();
			Yii::trace($bool, 'NewProjectForm');
			
			return $bool;
		}
		
		return false;
	}
	
	public function validate() {
		
	}
}
