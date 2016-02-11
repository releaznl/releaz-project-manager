<?php
use yii\grid\GridView;
use yii\base\Widget;
?>

<div class="overview-mail">
	<p><?= Yii::t('mail', 'Thank you for requesting your project with us. Below is an overview of what you have requested. We will contact you as soon as possible when we have accepted your request.') ?></p>

	<h3><?= Yii::t('request-project', 'One-off costs')?></h3>
	
        <table>
            
            <?php
            foreach($oneOffDataProvider->allModels as $model):
            ?>
            <tr><td><?= $model->name ?></td><td><?= Yii::$app->formatter->asCurrency($model->price) ?></td></tr>
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
            <tr><td>Totaal</td><td><?= Yii::$app->formatter->asCurrency($totalOnce)?></td></tr>
        </table>
	
	<h3><?= Yii::t('request-project', 'Monthly costs')?></h3>
	
        <table>
            
            <?php
            foreach($monthlyDataProvider->allModels as $model):
            ?>
            <tr><td><?= $model->name ?></td><td><?= Yii::$app->formatter->asCurrency($model->price) ?></td></tr>
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
            <tr><td>Totaal</td><td><?= Yii::$app->formatter->asCurrency($totalMonthly) ?></td></tr>
        </table>
</div>