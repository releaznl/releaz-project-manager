<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Functionality;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

    <?= $form->field($model, 'functionality_id')->dropdownList(ArrayHelper::map(Functionality::find()->all(), 'functionality_id', 'name')) ?>

    <?= $form->field($model, 'deleted')->checkBox(['label' => 'Deleted']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
