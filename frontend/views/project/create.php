<?php

use yii\helpers\Html;

use frontend\models\Customer;
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
			$("#newprojectform-new_user").val(true);
			$("#existing-user").hide();
			$("#new-user").show();
		}

		function existingContact()
		{
			$("#newprojectform-new_user").val(false);
			$("#new-user").hide();
			$("#existing-user").show();
		}
	'
		, View::POS_HEAD);

$this->title = 'Create Project';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>
    

	    <?php $form = ActiveForm::begin(); $users = User::find()->all() ?>
	
	    <?= $form->field($model, 'project_description')->textInput() ?>
	
	    <?= $form->field($model, 'projectmanager_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['Select a projectmanager'])  ?>
	    
    <div id="existing-user">
    	<fieldset>
    		<legend>Existing user</legend>
	    		<?= Html::button( 'New user', ['onClick' => 'js:newContact()', 'class' => 'btn btn-default']) ?>
	    		
	    		<br>
    			
    			<?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['prompt' => 'Select a client']) ?>
    	</fieldset>
    </div>
	    
    <div id="new-user" style="display:none;">
	    <fieldset>
	    	<legend>New user</legend>
	    	<?= Html::button( 'Existing user', ['onClick' => 'js:existingContact()', 'class' => 'btn btn-default']) ?>
	    	
	    	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
		    
		    <?= $form->field($model, 'password')->passwordInput() ?>
		
		    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'kvk')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'btw')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>
		
		    <?= $form->field($model, 'description')->textInput() ?>
		    
		    <?= $form->field($model, 'new_user')->hiddenInput() ?>
		    
	    </fieldset>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton('create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
