<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use common\models\User;
use common\models\Customer;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); $users = User::find()->all(); $customers = Customer::find()->all(); ?>
    
    <?= $form->field($model, 'description')->textInput() ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($customers, 'customer_id', 'name'), [Yii::t('project', 'Select a client')]) ?>

    <?= $form->field($model, 'projectmanager_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), [Yii::t('project', 'Select a projectmanager')])  ?>
    
    <?= $form->field($model, 'deleted')->checkbox(['label' => 'Deleted'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
