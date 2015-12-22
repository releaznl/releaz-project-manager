<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\base\Widget;

$this->title = Yii::t('request-project', 'Overview');

?>

<div>
	<h1><?= $this->title ?></h1>
	
	<p><?= Yii::t('request-project', 'The following is an overview of the project that will be generated, along with the estimated price of the project.')?></p>
	
	<h3><?= Yii::t('request-project', 'One-off costs')?></h3>
	
	<?= GridView::widget([
			'dataProvider' => $oneoffDataProvider,
			'showFooter' => true,
			'columns' => [
					'name',
					'description',
					[
						'attribute' => 'price',
						'format' => 'currency',
						'footer' => \common\components\grid\TotalColumn::pageTotal($oneoffDataProvider->models, 'price'),
					],
			]
	]) ?>
	
	<h3><?= Yii::t('request-project', 'Monthly costs')?></h3>
	
	<?= GridView::widget([
			'dataProvider' => $monthlyDataProvider,
			'showFooter' => true,
			'columns' => [
					'name',
					'description',
					[
						'attribute' => 'price',
						'format' => 'currency',
						'footer' => \common\components\grid\TotalColumn::pageTotal($monthlyDataProvider->models, 'price'),
					],
			]
	]) ?>
	
	<?= Html::a(Yii::t('common', 'Last step'), Url::to(['/request-project/step-5']), ['class' => 'btn btn-primary'])?>
	<?= Html::a(Yii::t('common', 'Create'), Url::to(['/request-project/create-user']), ['class' => 'btn btn-success']) ?>
</div>