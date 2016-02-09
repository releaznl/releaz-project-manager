<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */
/* @var $form yii\widgets\ActiveForm */

$nextIndex = count($models);
$this->registerJs(<<<JS

	var nextIndex = $nextIndex;
	$('#add-functionality-line').click(addLine);
	$('.remove-functionality-line').click(removeLine);

	function addLine()
	{
		\$newRow = $('<tr/>');

		$('<td/>').append(formGroup('name', textInput('name'))).appendTo(\$newRow);
		$('<td/>').append(formGroup('description', textInput('description'))).appendTo(\$newRow);
		$('<td/>').append(formGroup('amount', textInput('amount'))).appendTo(\$newRow);
		$('<td/>').append(formGroup('price', textInput('price'))).appendTo(\$newRow);
		$('<td/>').append(hiddenInput('functionality_id')).append(deleteIcon()).appendTo(\$newRow);

		$('#functionality-lines tbody').append(\$newRow);

		++nextIndex;
	}

	function removeLine()
	{
		$(this).closest('tr').remove();
		return false;
	}

	function textInput(attribute)
	{
		return $('<input/>', {
			id: 'functionality-' + nextIndex + '-' + attribute,
			class: 'form-control',
			type: 'text',
			name: 'Functionality[' + nextIndex + '][' + attribute + ']'
		});
	}

	function selectInput(attribute, options)
	{
		\$select =  $('<select/>', {
			id: 'functionality-' + nextIndex + '-' + attribute,
			class: 'form-control',
			name: 'Functionality[' + nextIndex + '][' + attribute + ']'
		});

		options.forEach(function(option) {
			\$select.append($('<option/>', {
				text: option.label,
				value: option.value
			}));
		});

		return \$select;
	}

	function staticInput(attribute, value)
	{
		return $('<p/>', {
			id: 'functionality-' + nextIndex + '-' + attribute,
			class: 'form-control-static',
			text: value
		});
	}

	function hiddenInput(attribute)
	{
		return $('<input/>', {
			id: 'functionality-' + nextIndex + '-' + attribute,
			type: 'hidden',
			name: 'Functionality[' + nextIndex + '][' + attribute + ']'
		});
	}

	function formGroup(attribute, input)
	{
		return $('<div/>', {
			class: 'form-group field-functionality-' + nextIndex + '-' + attribute + ' required'
		}).append(input).append(helpBlock());
	}

	function helpBlock()
	{
		return $('<div/>', {
			class: 'help-block'
		});
	}

	function deleteIcon()
	{
		return $('<a/>', {
			class: 'remove-invoice-line',
			href: '#'
		}).append($('<span/>', {
			class: 'glyphicon glyphicon-trash'
		})).click(removeLine);
	}
JS
);
?>

<div class="functionality-form">

<div class="block">
    <?php $form = ActiveForm::begin(['enableClientValidation' => false]); $index = 0; ?>
	<table class="table table-bordered table-striped" id="functionality-lines">
		<thead>
			<th><?= Yii::t('functionality','Name') ?></th>
			<th><?= Yii::t('functionality','Description')?></th>
			<th><?= Yii::t('functionality','Amount')?></th>
			<th><?= Yii::t('functionality','Price')?></th>
		</thead>
		<tbody>
		<?php foreach ($models as $model) : ?>
			<tr>
				<td><?=  $form->Field($model, "[$index]name")->label(false) ?></td>
				<td><?=  $form->Field($model, "[$index]description")->label(false) ?></td>
				<td><?=  $form->Field($model, "[$index]amount")->label(false) ?></td>
				<td><?=  $form->Field($model, "[$index]price")->label(false) ?></td>
				<td><?= Html::activeHiddenInput($model, "[$index]functionality_id") ?><?= Html::a('<span class="glyphicon glyphicon-trash"></span>', '#', ['class' => 'remove-functionality-line']) ?></td>
			</tr>
		<?php $index++; ?>
		<?php endforeach ?>
		</tbody>
	</table>

    <div class="form-group">
    	<?= Html::a(Yii::t('functionality', 'Add functionality line'), null, ['class' => 'btn btn-success', 'id' => 'add-functionality-line']) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
