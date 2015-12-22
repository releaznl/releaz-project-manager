<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;

?>
<h1><?php echo $category->name ?></h1>

<p>
    <?php $form = ActiveForm::begin();?>
	
	<?php  /* $form->field ($model, 'selection')->radioList(ArrayHelper::map($category->bidParts, 'id', 'description'), ['separator' => '<br>'])->label(false); */ ?>
	
	<?php foreach ($category->bidParts as $part) : ?>
	
	<?= $form->field($model, $part->attribute_name)->checkBox([
			'label' => $part->getLabel(true),
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
