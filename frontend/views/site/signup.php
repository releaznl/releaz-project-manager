<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = Yii::t('site', 'Signup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('site', 'Please fill out the following fields to signup:')?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <?= $form->field($model, 'company_name')?>
                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'description') ?>
                <?= $form->field($model, 'zip_code') ?>
                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'location') ?>
                <?= $form->field($model, 'phone_number') ?>
                <?= $form->field($model, 'website') ?>
                <?= $form->field($model, 'kvk') ?>
                <?= $form->field($model, 'btw') ?>


                <div class="form-group">
                    <?= Html::submitButton(Yii::t('site', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
