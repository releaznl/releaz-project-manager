<?php

use common\models\Customer;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;

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

		function checkIfUpdating() {
			if ($(\'#contactmoment-customer_id\').val()) {
				existingContact();
			}
		}
	'
		, View::POS_HEAD);

$this->registerJs('$("document").ready(checkIfUpdating());');
?>

<div class="contact-moment-form block">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moment')->widget(\kartik\datetime\DateTimePicker::classname(), [
		    		'pluginOptions' => [
		    				'format' => 'yyyy-mm-dd h:ii:00',
		    		],
		    ]); ?>
    
    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>
    
    <div id="existing-user" style="display:none;">
    	<fieldset>
    		<legend><?= Yii::t('project','Existing user') ?></legend>
	    		<?= Html::button(Yii::t('user', 'New User'), ['onClick' => 'js:newContact()', 'class' => 'btn btn-default']) ?>
	    		
	    		<br>
    			
    			<?= $form->field($model, 'customer_id')->dropDownList(ArrayHelper::map($customers, 'customer_id', 'name'), ['prompt' => Yii::t('app','Select a client'), 'enableClientValidation' => false]) ?>
    	</fieldset>
    </div>
	    
    <div id="new-user">
	    <fieldset>
	    	<legend><?= Yii::t('user', 'New user') ?></legend>
	    	<?= Html::button(Yii::t('user', 'Existing user'), ['onClick' => 'js:existingContact()', 'class' => 'btn btn-default']) ?>
	    	
	    	<?= $form->field($customer, 'name', 			['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'address', 			['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'zip_code', 		['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
	    	<?= $form->field($customer, 'contact_type',		['enableClientValidation' => false])->dropDownList(Customer::getContactTypes()) ?>
		    <?= $form->field($customer, 'location', 		['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'phone_number', 	['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'website', 			['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'kvk', 				['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'btw', 				['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'email_address', 	['enableClientValidation' => false])->textInput(['maxlength' => true]) ?>
		    <?= $form->field($customer, 'description', 		['enableClientValidation' => false])->textInput()?>
		    
	    </fieldset>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
