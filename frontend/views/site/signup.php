<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Customer;

$this->title = Yii::t('site', 'Signup');
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    
<ul class="steps">
	<li class="active"><span>Stap 1</span><?= Html::a(Yii::t('request-project', 'Strategy'), ['/request-project/step-1'])?></li>
	<li class="active"><span>Stap 2</span><?= Html::a(Yii::t('request-project', 'Design'), ['/request-project/step-2'])?></li>
	<li class="active"><span>Stap 3</span><?= Html::a(Yii::t('request-project', 'Planning'), ['/request-project/step-3'])?></li>
	<li class="active"><span>Stap 4</span><?= Html::a(Yii::t('request-project', 'Hosting'), ['/request-project/step-4'])?></li>
	<li class="active"><span>Stap 5</span><?= Html::a(Yii::t('request-project', 'Website promotion'), ['/request-project/step-5']) ?></li>
	<li class="active"><span>Stap 6</span><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/step-5']) ?></li>
</ul>
    
    <p>We ontvangen graag onderstaande gegevens voor het afronden van de offerte aanvraag. Na deze stap wordt een overzicht van de gekozen opties getoond.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                
                <?= $form->field($model, 'company_name')?>
                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'contact') ?>
                <?= $form->field($model, 'address') ?>
                <?= $form->field($model, 'zip_code') ?>
                <?= $form->field($model, 'location') ?>
    			<?= $form->field($model, 'contact_type')->dropDownList(Customer::getContactTypes())?>
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
