

<?php

use yii\helpers\Html;

use common\models\Customer;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\web\View;
use frontend\models\NewProjectForm;


/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->registerJs(
		'
		
		function newContact()
		{
			$(\'#newprojectform-new_user\').val(true);
			$(\'#existing-user\').hide();
			$(\'#new-user\').show();
		}

		function existingContact()
		{
			$(\'#newprojectform-new_user\').val(false);
			$(\'#new-user\').hide();
			$(\'#existing-user\').show();
		}
	'
		, View::POS_HEAD);

$this->title = Yii::t('project', 'Create Project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">
    

	    <?php $form = ActiveForm::begin(); $users = User::find()->all(); $customers = Customer::find()->all(); ?>
	
	    <?= $form->field($model, 'description')->textInput() ?>
	    <?= $form->field($model, 'projectmanager_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), [Yii::t('project','Select a projectmanager')])  ?>
	    
    <div id="existing-user" style="display:none;">
    	<fieldset>
    		<legend><?= Yii::t('project','Existing user') ?></legend>
	    		<?= Html::button(Yii::t('user', 'New User'), ['onClick' => 'js:newContact()', 'class' => 'btn btn-default']) ?>
	    		
	    		<br>
    			
    			<?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($customers, 'customer_id', 'name'), ['prompt' => Yii::t('app','Select a client')]) ?>
    	</fieldset>
    </div>
	    
    <div id="new-user">
	    <fieldset>
	    	<legend><?= 'New user' ?></legend>
	    	<?= Html::button(Yii::t('user', 'Existing user'), ['onClick' => 'js:existingContact()', 'class' => 'btn btn-default']) ?>
	    	
	    	<?= $form->field($customer, 'name')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'address')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'zip_code')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'location')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'phone_number')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'website')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'kvk')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'btw')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'email_address')->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'description')->textInput() ?>
		    
	    </fieldset>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('common','create'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
