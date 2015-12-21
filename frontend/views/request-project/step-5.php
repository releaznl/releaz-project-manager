<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;

?>
<h1><?php echo $category->name ?></h1>

<p><?php echo $category->description ?></p>

<p>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
    
    <?php foreach ($category->bidParts as $part) : ?>
	
	<?php echo $form->field($model, $part->attribute_name)->checkBox([
			'label' => $part->name . ' ' . $part->price,
			'value' => $part->id,
			'labelOptions' => [
				'data-toggle' => 'tooltip',
				'title' => $part->description,
			]
	]); ?>
	
	<?php endforeach; ?>
	
    <?= Html::a(Yii::t('common','Last step'), ['step-4'], ['class' => 'btn btn-primary']) ?>
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
	
	<?php ActiveForm::end() ?>
</p>
