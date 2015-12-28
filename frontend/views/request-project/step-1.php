<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\HTML;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\base\Widget;

$this->title = $category->name;

?>
<h1><?php echo $category->name ?></h1>

<ul>
	<li class="active"><?= Html::a(Yii::t('request-project', 'Step 1 - Strategy'), ['/request-project/step-1'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 2 - Design'), ['/request-project/step-2'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 3 - Planning'), ['/request-project/step-3'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 4 - Hosting'), ['/request-project/step-4'])?></li>
	<li><?= Html::a(Yii::t('request-project', 'Step 5 - Website promotion'), ['/request-project/step-5']) ?></li>
	<li><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/step-5']) ?></li>
</ul>

<div class="col-sm-6">
	<div class="row">
		<div class="block">
		    <?php $form = ActiveForm::begin();?>
			
			<?php  /* $form->field ($model, 'selection')->radioList(ArrayHelper::map($category->bidParts, 'id', 'description'), ['separator' => '<br>'])->label(false); */ ?>
			
			<?php foreach ($category->bidParts as $part) : ?>
			
			<?= $form->field($model, $part->attribute_name)->checkBox([
					'label' => $part->getLabel(true),
					'value' => $part->id,
					'uncheckValue' => null,
					'labelOptions' => [
							'id' => $part->id,
			]
			]); ?>
			
			<?php endforeach; ?>
			
		    <?= $form->field($model, 'comment') ?>
			
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
