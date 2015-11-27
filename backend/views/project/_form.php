<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); $users = User::find()->all() ?>
    
    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['Select a client']) ?>

    <?= $form->field($model, 'projectmanager_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['Select a projectmanager'])  ?>
    
    <?= $form->field($model, 'deleted')->checkbox(['label' => 'Deleted'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Create') : Yii::t('app','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
