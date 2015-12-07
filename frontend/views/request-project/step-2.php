<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\HTML;

?>

<h1><?php echo $category->name ?></h1>
<p><?php echo $category->description ?></p>

<p>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?php echo $form->field($model, 'website1')->textInput(); ?>
    <?php echo $form->field($model, 'website2')->textInput()->label(false); ?>
    <?php echo $form->field($model, 'website3')->textInput()->label(false); ?>
    
    <?php echo $form->field($model, 'goal')->textInput() ?>
    
    <?php // Toevoegen slider ?>
    <?php echo $form->field($model, 'targetAudience')->dropdownList($model->targetAudiences, ['prompt' => 'Selecteer een doelgroep']) ?>
    
    <?php echo $form->field($model, 'currentStyle')->fileInput() ?>
    
    <?php echo '<p>Het ontwerp van de website wordt gebaseerd op de ingevulde gegevens...</p>' ?>
    	
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
	
	<?php ActiveForm::end() ?>
</p>