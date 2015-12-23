<?php
use yii\grid\GridView;
use yii\base\Widget;
?>

<div class="overview-mail">
	<p><?= Yii::t('mail', 'Thank you for requesting your project with us. Below is an overview of what you have requested. We will contact you as soon as possible when we have accepted your request.') ?></p>

	<h3><?= Yii::t('request-project', 'One-off costs')?></h3>
	
	<?= GridView::widget([
			'dataProvider' => $oneOffDataProvider,
			'showFooter' => true,
			'columns' => [
					'name',
					'description',
					[
							'attribute' => 'price',
							'format' => 'currency',
							'footer' => \common\components\grid\TotalColumn::pageTotal($oneOffDataProvider->models, 'price'),
					]
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
					]
			]
	]) ?>
</div>