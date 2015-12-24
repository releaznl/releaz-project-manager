<?php
/* @var $this yii\web\View */

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\base\Widget;

$this->title = Yii::t('request-project', 'Overview');

?>

<div>
	<h1><?= $this->title ?></h1>
	
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
					[
						'label' => Yii::t('request-project', 'Step 5'),
						'url' => ['/request-project/step-5'],
					],
					[
						'label' => Yii::t('request-project', 'Overview'),
						'url' => ['/request-project/overview'],
					],
				]
		]); ?>

	<div class="col-sm-6">
		<div class="row">
			<div class="block">
				<h3><?= Yii::t('request-project', 'One-off costs')?></h3>
				
				<?= GridView::widget([
						'dataProvider' => $oneoffDataProvider,
						'layout' => '{items}',
						'showFooter' => true,
						'columns' => [
								[
									'attribute' => 'name',
									'footer' => Yii::t('request-project', 'Total'),
								],
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
						'layout' => '{items}',
						'showFooter' => true,
						'columns' => [
								[
									'attribute' => 'name',
									'footer' => Yii::t('request-project', 'Total'),
								],
								'description',
								[
									'attribute' => 'price',
									'format' => 'currency',
									'footer' => \common\components\grid\TotalColumn::pageTotal($monthlyDataProvider->models, 'price'),
								],
						]
				]) ?>
				
				<?= Html::a(Yii::t('common', 'Last step'), Url::to(['/request-project/step-5']), ['class' => 'btn btn-primary'])?>
				<?= Html::a(Yii::t('common', 'Confirm'), Url::to(['/request-project/create-user']), ['class' => 'btn btn-success']) ?>
			</div>
		</div>
	</div>
</div>

<div class="col-sm-6">
	<div class="row">
		<div class="block info">
			<?= Yii::t('request-project', 'The following is an overview of the project that will be generated, along with the estimated price of the project.')?>
		</div>
		<div class="call">
			Kom je er niet uit of heb je vragen?<br />
			<a href="tel:+31503015965">050 30 15 965</a>
		</div>
	</div>
</div>