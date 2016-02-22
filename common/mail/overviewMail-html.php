<?php
use yii\grid\GridView;
use yii\base\Widget;
?>

<div class="overview-mail">
	<p><?= Yii::t('mail', 'Thank you for requesting your project with us. Below is an overview of what you have requested. We will contact you as soon as possible when we have accepted your request.') ?></p>

	<h3><?= Yii::t('request-project', 'One-off costs')?></h3>
	
        <table width="100%" style="color:#4E5860;font-size:15px;" cellpadding="10">
            
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
            <tr><td width="80%" style="text-align: right;border-top:1px solid #EFEFEF;"><strong>Totaal</strong>&nbsp;</td><td style="border-top:1px solid #EFEFEF;"><strong><?= Yii::$app->formatter->asCurrency($totalOnce)?></strong></td></tr>
        </table>
	
	<h3><?= Yii::t('request-project', 'Monthly costs')?></h3>
	
        <table width="100%" style="color:#4E5860;font-size:15px;" cellpadding="10">
            
            <?php
            foreach($monthlyDataProvider->allModels as $model):
            ?>
            <tr><td width="80%"><?= $model->name ?></td><td><?= Yii::$app->formatter->asCurrency($model->price) ?></td></tr>
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
            <tr><td style="text-align: right;border-top:1px solid #EFEFEF;"><strong>Totaal</strong>&nbsp;</td><td style="border-top:1px solid #EFEFEF;"><strong><?= Yii::$app->formatter->asCurrency($totalMonthly) ?></strong></td></tr>
        </table>
</div>