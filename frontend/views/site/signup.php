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
    
    <?= Breadcrumbs::widget([
// 				'itemTemplate' => '<li>{link}</li>',
				'links' => [
					[
						'label' => Yii::t('request-project', 'Step 1'),
						'url' => ['/request-project/step-1'],
					],
					[
						'label' => Yii::t('request-project', 'Step 2'),
						'url' => ['/request-project/step-2'],
					],
					[
						'label' => Yii::t('request-project', 'Step 3'),
						'url' => ['/request-project/step-3'],
					],
					[
						'label' => Yii::t('request-project', 'Step 4'),
						'url' => ['/request-project/step-4'],
					],
					[
						'label' => Yii::t('request-project', 'Step 5'),
						'url' => ['/request-project/step-5'],
					],
					[
						'label' => Yii::t('request-project', 'Overview'),
						'url' => ['/request-project/overview'],
					],
				]
		]); ?>
    
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
