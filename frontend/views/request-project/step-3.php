<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\HTML;

?>

<h1><?php echo $category->name ?></h1>

<div class="col-sm-6">
    <?php $form = ActiveForm::begin() ?>
    
    <?php echo $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), [
    		'language' => 'nl',
    		'dateFormat' => 'MM/dd/yyyy',
    ]); ?>
    
    <?= Html::a(Yii::t('common','Last step'), ['step-2'], ['class' => 'btn btn-primary']) ?>
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']); ?>
	
	<?php ActiveForm::end(); ?>
</div>

<div class="col-sm-6">
	<?php echo $category->description ?>
</div>