<?php

use common\models\Todo;
use common\models\Project;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'todo_id')->dropdownList(ArrayHelper::map(Todo::find()->all(), 'todo_id', 'name')) ?>

    <?= $form->field($model, 'project_id')->dropdownList(ArrayHelper::map(Project::find()->all(), 'project_id', 'description')) ?>

    <?= $form->field($model, 'deleted')->checkBox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
