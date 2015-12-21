<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;

?>
<h1><?php echo $category->name ?></h1>
<p><?php echo $category->description ?></p>

<p>
    <?php $form = ActiveForm::begin();?>
	
	<?php  /* $form->field ($model, 'selection')->radioList(ArrayHelper::map($category->bidParts, 'id', 'description'), ['separator' => '<br>'])->label(false); */ ?>
	
	<?php foreach ($category->bidParts as $part) : ?>
	
	<?php echo $form->field($model, $part->attribute_name)->checkBox([
			'label' => $part->description,
			'value' => $part->id,
			'uncheckValue' => null,
			'labelOptions' => [
					'id' => $part->id,
	]
	]); ?>
	
	<?php endforeach; ?>
	
	<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
	
	<?php ActiveForm::end() ?>
</p>
