<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use yii\helpers\HTML;

$this->title = $category->name;

?>

<h1><?php echo $category->name ?></h1>

<ul>
	<li class="active"><?= Html::a(Yii::t('request-project', 'Step 1 - Strategy'), ['/request-project/step-1'])?></li>
	<li class="active"><?= Html::a(Yii::t('request-project', 'Step 2 - Design'), ['/request-project/step-2'])?></li>
	<li class="active"><?= Html::a(Yii::t('request-project', 'Step 3 - Planning'), ['/request-project/step-3'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 4 - Hosting'), ['/request-project/step-4'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 5 - Website promotion'), ['/request-project/step-5']) ?></li>
	<li><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/step-5']) ?></li>
</ul>

<div class="col-sm-6">
	<div class="row">
		<div class="block">
		    <?php $form = ActiveForm::begin() ?>
		    
		    <?= $form->field($model, 'deadline')->widget(\yii\jui\DatePicker::classname(), [
		    		'language' => 'nl',
		    		'dateFormat' => 'dd/MM/yyyy',
		    		'options' => [
		    				'class' => 'form-control',
		    		],
		    ]); ?>
			
		    <?= $form->field($model, 'comment') ?>
		    
		    <?= Html::a(Yii::t('common','Last step'), ['step-2'], ['class' => 'btn btn-primary']) ?>
			<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']); ?>
			
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

<div class="col-sm-6">
	<div class="row">
		<div class="block info">
			<?php echo $category->description ?>
		</div>
		<div class="call">
			Kom je er niet uit of heb je vragen?<br />
			<a href="tel:+31503015965">050 30 15 965</a>
		</div>
	</div>
</div>
