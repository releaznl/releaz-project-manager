<?php
/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\base\Widget;


$this->title = $category->name;

?>
<h1><?php echo $category->name ?></h1>

<ul class="steps">
	<li class="active"><span>Stap 1</span><?= Html::a(Yii::t('request-project', 'Strategy'), ['/request-project/step-1'])?></li>
	<li><span>Stap 2</span><?= Html::a(Yii::t('request-project', 'Design'), ['/request-project/step-2'])?></li>
	<li><span>Stap 3</span><?= Html::a(Yii::t('request-project', 'Planning'), ['/request-project/step-3'])?></li>
	<li><span>Stap 4</span><?= Html::a(Yii::t('request-project', 'Hosting'), ['/request-project/step-4'])?></li>
	<li><span>Stap 5</span><?= Html::a(Yii::t('request-project', 'Website promotion'), ['/request-project/step-5']) ?></li>
	<li><span>Stap 6</span><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/overview']) ?></li>
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
