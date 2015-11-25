<?php

use yii\helpers\Html;

use frontend\models\Customer;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = 'Create Project';
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$users = User::find()->all();
$model->new_user = true;
?>
<div class="project-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="project-form">

    <?php $form = ActiveForm::begin(); $users = User::find()->all() ?>

    <?= $form->field($model, 'project_description')->textInput() ?>

    <?= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['prompt' => 'Select a client']) ?>
    
    <?= $form->field($model, 'projectmanager_id')->dropDownList(ArrayHelper::map($users, 'id', 'username'), ['Select a projectmanager'])  ?>
    
    <?= $form->field($model, 'new_user')->dropDownList([0 => 'No', 1 => 'Yes']) ?>
    
    <h2>User details</h2>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kvk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'btw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
    
