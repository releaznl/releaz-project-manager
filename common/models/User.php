<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
	public $password1;
	public $password2;
	public $roles;
	
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_AWAITING_REQUEST = 11;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    
    /**
     * List of statusses sorted by status value
     * @return string[]
     */
    public static function getStatusses() {
    	return [
    			self::STATUS_DELETED => 'Verwijdert',
    			self::STATUS_ACTIVE => 'Actief',
    			self::STATUS_AWAITING_REQUEST => 'In afwachting',
    	];
    }
    
    /**
     * Scenarios
     * {@inheritDoc}
     * @see \yii\base\Model::scenarios()
     */
    public function scenarios() {
    	$scenarios = parent::scenarios();
    	$scenarios['createProject'] = [];
    	return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function attributeLabels() {
    	return [
    			'username' => 'Gebruikersnaam',
    			'status' => 'Status',
    			'password1' => 'Wachtwoord',
    			'password2' => 'Wachtwoord',
    			'roles' => 'Rollen',
    			'email' => 'Email',
    	];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	['username', 'trim'],
        	['email', 'email'],
        	[['password1', 'password2', 'roles'], 'safe'],
//         	['password2', 'compare', 'compareAttribute' => 'password1'],
            ['status', 'default', 'value' => self::STATUS_AWAITING_REQUEST],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    
    public function can($permissionName) {
    	return Yii::$app->authManager->checkAccess($this->id, $permissionName);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    
    /**
     * Checks if the user is a projectmanager
     * @return boolean
     */
    public function isProjectmanager() {
    	$manager = Yii::$app->authManager;
    	$assignment = $manager->getAssignment('projectmanager', $this->id);
    	
    	if (isset($assignment)) {
    		return true;
    	} else {
    		return false;
    	}
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }
    
    public static function getProjectmanagers() {
    	return self::getUsersWithPermission('createProject');
    }
    
    private static function getUsersWithPermission($permission) {
    	$tmp = User::find()->all();
    	$result = array();
    	 
    	foreach ($tmp as $checkedUser) {
    		if ($checkedUser->can($permission)) {
    			$result[] = $checkedUser;
    		}
    	}
    	 
    	return $result;
    }
    
    public function getAdmins() {
    	return self::getUsersWithPermission('maintainBackend');
    }
    
    public function getClients() {
    	return array();
    }
    
    public function afterSave($insert, $changedAttributes) 
    {
    	parent::afterSave($insert, $changedAttributes);
    	
    	if (!empty($this->roles)) {
			\Yii::$app->db->createCommand()->delete('auth_assignment', 'user_id = ' . (int)$this->id)->execute(); //Delete existing value
			foreach ($this->roles as $selected_role) { //Write new values
				$role = Yii::$app->authManager->getRole($selected_role);
				Yii::$app->authManager->assign($role, $this->id);
			}
		}
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles0()
    {
        return $this->hasMany(File::className(), ['updater_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctionalities()
    {
        return $this->hasMany(Functionality::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFunctionalities0()
    {
        return $this->hasMany(Functionality::className(), ['updater_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects0()
    {
        return $this->hasMany(Project::className(), ['client_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects1()
    {
        return $this->hasMany(Project::className(), ['projectmanager_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects2()
    {
        return $this->hasMany(Project::className(), ['updater_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos()
    {
        return $this->hasMany(Todo::className(), ['creator_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodos0()
    {
        return $this->hasMany(Todo::className(), ['updater_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTodos()
    {
        return $this->hasMany(UserTodo::className(), ['user_id' => 'id']);
    }
}
