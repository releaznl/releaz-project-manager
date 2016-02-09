<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'username')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList(User::getStatusses(), ['selected' => User::STATUS_ACTIVE])?>
    
    <?= $form->field($model, 'email')->textInput() ?>
    
    <?= $form->field($model, 'password1')->passwordInput() ?>
    
    <?= $form->field($model, 'password2')->passwordInput() ?>
    
    <fieldset>
		<legend>Rollen</legend>
		<?= $form->field($model, 'roles')->checkboxList(\yii\helpers\ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'name')); ?>
	</fieldset>
    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('common','Create'), ['class' => 'btn btn-success']) ?>
    </div>
    
    <?php ActiveForm::end()?>

</div>
