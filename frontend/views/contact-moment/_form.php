<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMoment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-moment-form block">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moment')->textInput(); // TODO datetimepicker toevoegen ?>
    
    <?= $form->field($model, 'customer_id')->dropDownList(ArrayHelper::map($customers, 'customer_id', 'name'))?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
