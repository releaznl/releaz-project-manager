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
    public $username;
    public $email;
    public $password;
    
    public $name;
    public $address;
    public $zip_code;
    public $location;
    public $phone_number;
    public $website;
    public $kvk;
    public $btw;
    public $description;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This company name is already in use.'],
            
            [['address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'address', 'zip_code', 'location', 'phone_number', 'website', 'kvk', 'btw'], 'string', 'max' => 128],
            
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
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
                
                if ($customer->save(false)) {
                    
                    return $user;
                }
            }
        }

        return null;
    }
}
