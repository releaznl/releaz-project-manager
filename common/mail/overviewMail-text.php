<?php
?>
<?= Yii::t('mail', 'Thank you for requesting your project with us. Below is an overview of what you have requested. We will contact you as soon as possible when we have accepted your request.') ?>

<?= Yii::t('request-project', 'One-off costs')?>
	
<?php
            foreach($oneOffDataProvider->allModels as $model):
            ?>
            <?= $model->name ?> <?= Yii::$app->formatter->asCurrency($model->price) ?>
            <?php endforeach; ?>            
	
<!--//            GridView::widget([
//			'dataProvider' => $oneOffDataProvider,
//			'layout' => '{items}',
//			'showFooter' => true,
//			'columns' => [
//					'name',
//					'description',
//					[
//							'attribute' => 'price',
//							'format' => 'currency',
//							'footer' => \common\components\grid\TotalColumn::pageTotal($oneOffDataProvider->models, 'price'),
//					]
//			]
//	]) -->
Totaal <?= Yii::$app->formatter->asCurrency($totalOnce)?>
        
<?= Yii::t('request-project', 'Monthly costs')?>
            
<?php
foreach($monthlyDataProvider->allModels as $model):
?>
<?= $model->name ?> <?= Yii::$app->formatter->asCurrency($model->price) ?>
            <?php endforeach; ?>
<!--	GridView::widget([
			'dataProvider' => $monthlyDataProvider,
			'layout' => '{items}',
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
	]) -->
 Totaal <?= Yii::$app->formatter->asCurrency($totalMonthly) ?>
