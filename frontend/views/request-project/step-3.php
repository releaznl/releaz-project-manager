<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\HTML;

?>

<h1><?php echo $category->name ?></h1>

<div class="col-sm-6">
	<div class="row">
		<div class="block">
		    <?php $form = ActiveForm::begin() ?>
		    
		    <?php echo $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), [
		    		'language' => 'nl',
		    		'dateFormat' => 'MM/dd/yyyy',
		    ]); ?>
		    
		    <?= Html::a(Yii::t('common','Last step'), ['step-2'], ['class' => 'btn btn-primary']) ?>
			<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']); ?>
			
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

<div class="col-sm-6">
	<div class="row">
		<div class="block info">
			<?php echo $category->description ?>
		</div>
		<div class="call">
			Komt je er niet uit of heb je vragen?<br />
			<a href="tel:+31503015965">050 30 15 965</a>
		</div>
	</div>
</div>
