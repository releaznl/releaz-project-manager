<?php

use common\models\Project;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'uploaded_file')->fileInput()?>

    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'todo_id')->dropDownList(ArrayHelper::map($todos, 'todo_id', 'name'), ['prompt' => Yii::t('file', 'No todo')]) ?>

    <?= $form->field($model, 'project_id')->dropDownList(ArrayHelper::map($projects, 'project_id', 'name'), ['prompt' => Yii::t('file', 'No project')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
