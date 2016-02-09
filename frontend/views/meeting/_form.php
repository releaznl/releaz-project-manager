<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form block">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'moment')->widget(\kartik\datetime\DateTimePicker::classname(), [
		    		'pluginOptions' => [
		    				'format' => 'yyyy-mm-dd h:ii:00',
		    		],
		    ]); ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
