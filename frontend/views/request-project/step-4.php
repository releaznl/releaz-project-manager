 <?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;
use common\models\BidPart;

$this->title = $category->name;

?>
<div>
	<h1><?php echo $category->name ?></h1>
	
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
				]
		]); ?>
	
	<div class="col-sm-6">
		<div class="row">
			<div class="block">
			    <?php $form = ActiveForm::begin();?>
			    
			    <?= $form->field($model, 'informatie')->textInput()->label(BidPart::find()->where(['attribute_name' => 'informatie'])->one()->getLabel()); ?>
			    
		   	 	<?= $form->field($model, 'comment') ?>
				
		    	<?= Html::a(Yii::t('common','Last step'), ['step-3'], ['class' => 'btn btn-primary']) ?>
				<?= Html::submitButton(Yii::t('common','Next step'), ['class' => 'btn btn-primary']) ?>
				
				<?php ActiveForm::end() ?>
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
</div>
