<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\HTML;

?>

<h1><?php echo $category->name ?></h1>
<p><?php echo $category->description ?></p>

<p>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?php echo $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), [
    		'language' => 'nl']); ?>
    
    <?php echo $form->field($model, 'noDeadline')->checkBox(); ?>
    
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
	
	<?php ActiveForm::end() ?>
</p>