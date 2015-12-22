<?php
namespace frontend\models;

use common\models\User;
use common\models\Customer;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $company_name;
    public $email;
    public $password;
    public $password_repeat;
    
    public $address;
    public $zip_code;
    public $location;
    public $phone_number;
    public $website;
    public $kvk;
    public $btw;
    public $description;
    public $contact_type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //['username', 'filter', 'filter' => 'trim'],
            //['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            //['username', 'string', 'min' => 2, 'max' => 255],
            
            //['name', 'required'],
            //['name', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This company name is already in use.'],
            
            [['address', 'zip_code', 'description', 'company_name'], 'required'],
            [['description'], 'string'],
            [['address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw'], 'string', 'max' => 128],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        	['password', 'compare'],
            [['password', 'password_repeat'], 'required'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
        	[['contact_type'] , 'integer'],
        ];
    }
    
    public function attributeLabels() {
    	return [
    			'email' 			=> \Yii::t('user','Email'),
    			'password_repeat' 	=> \Yii::t('user','Password'),
    			'password' 			=> \Yii::t('user','Password'),
    			
    			'company_name'		=> \Yii::t('customer','Company name'),
    			'contact_type' 		=> \Yii::t('customer','Contact type'),
    			'address' 			=> \Yii::t('customer','Address'),
    			'zip_code' 			=> \Yii::t('customer','Zip code'),
    			'location' 			=> \Yii::t('customer','Location'),
    			'phone_number' 		=> \Yii::t('customer','Phone number'),
    			'website' 			=> \Yii::t('customer','Website'),
    			'kvk' 				=> \Yii::t('customer','CoC number'),
    			'btw' 				=> \Yii::t('customer','Tax'),
    			'description' 		=> \Yii::t('customer','Description'),
    	];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->email;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            
            if ($user->save()) {
	            $customer = new Customer();
	            
	            $customer->name = $this->company_name;
	            $customer->location = $this->location;
	            $customer->address = $this->address;
	            $customer->zip_code = $this->zip_code;
	            $customer->phone_number = $this->phone_number;
	            $customer->website = $this->website;
	            $customer->kvk = $this->kvk;
	            $customer->btw = $this->btw;
	            $customer->email_address = $this->email;
	            $customer->description = $this->description;
	            $customer->contact_type = $this->contact_type;
	            
                $customer->user_id = $user->id;
                
                if ($customer->save(false)) {
                    
                    return $user;
                } else {
                	$user->delete();
                }
            } 
        }

        return null;
    }
}
