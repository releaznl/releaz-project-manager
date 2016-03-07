<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\DatePicker;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = $category->name;

?>

<h1><?php echo $category->name ?></h1>

<ul class="steps">
	<li class="active"><span>Stap 1</span><?= Html::a(Yii::t('request-project', 'Strategy'), ['/request-project/step-1'])?></li>
	<li class="active"><span>Stap 2</span><?= Html::a(Yii::t('request-project', 'Design'), ['/request-project/step-2'])?></li>
	<li class="active"><span>Stap 3</span><?= Html::a(Yii::t('request-project', 'Planning'), ['/request-project/step-3'])?></li>
	<li><span>Stap 4</span><?= Html::a(Yii::t('request-project', 'Hosting'), ['/request-project/step-4'])?></li>
	<li><span>Stap 5</span><?= Html::a(Yii::t('request-project', 'Website promotion'), ['/request-project/step-5']) ?></li>
	<li><span>Stap 6</span><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/overview']) ?></li>
</ul>

<div class="col-sm-6">
	<div class="row">
		<div class="block">
		    <?php $form = ActiveForm::begin() ?>
		    
		    <?= $form->field($model, 'deadline')->widget(\kartik\datetime\DateTimePicker::classname(), [
		    		'pluginOptions' => [
		    				'minView' => 'month',
		    				'format' => 'dd-mm-yyyy', //yyyy-mm-dd',
                                                'weekStart' => 1,
                                                'daysOfWeekDisabled' => [0,6],
                                                'todayHighlight' => true,
                                                'startDate' => '+7d',
		    		],
		    ]); ?>
			
		    <?= $form->field($model, 'comment')->textArea() ?>
		    
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
			<a href="tel:+31858769957">085 876 99 57</a>
		</div>
	</div>
</div>
