<?php

use common\models\Todo;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Arrayhelper;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">
    <?php $form = ActiveForm::begin(); ?>
<table>
	<thead>
		<th><?= Yii::t('todo', 'Name') ?></th>
		<th><?= Yii::t('todo', 'Description') ?></th>
		<th><?= Yii::t('todo', 'Status ID') ?></th>
	</thead>
	<tbody>
		<tr>
			<td><?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?></td>
			<td><?= $form->field($model, 'description')->textInput()->label(false) ?></td>
			<td><?= $form->field($model, 'status_id')->dropdownList(Todo::statusses())->label(false) ?></td>
		</tr>
	</tbody>
</table>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common', 'Create') : Yii::t('common', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
