<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */

$this->title = Yii::t('functionality','Update Functionality: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('functionality','Functionalities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->functionality_id]];
$this->params['breadcrumbs'][] = Yii::t('common','Update');
?>
<div class="functionality-update">
	
    <h1><?= Html::encode($this->title) ?></h1>
	
	<div class="block">
	    <?php $form = ActiveForm::begin(); ?>
	
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
	
	    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
	
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	
	    <?php ActiveForm::end(); ?>
	</div>
</div>
