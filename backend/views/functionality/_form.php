<?php

use common\models\Project;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="functionality-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'project_id')->dropDownList(ArrayHelper::map(Project::find()->all(), 'project_id', 'description')) ?>
    
    <?= $form->field($model, 'deleted')->checkBox(['label' => 'Deleted']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
