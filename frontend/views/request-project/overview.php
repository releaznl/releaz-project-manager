<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = Yii::t('request-project', 'Overview');

?>

<div>
	<h1><?= $this->title ?></h1>
	
<ul class="steps">
	<li class="active"><span>Stap 1</span><?= Html::a(Yii::t('request-project', 'Strategy'), ['/request-project/step-1'])?></li>
	<li class="active"><span>Stap 2</span><?= Html::a(Yii::t('request-project', 'Design'), ['/request-project/step-2'])?></li>
	<li class="active"><span>Stap 3</span><?= Html::a(Yii::t('request-project', 'Planning'), ['/request-project/step-3'])?></li>
	<li class="active"><span>Stap 4</span><?= Html::a(Yii::t('request-project', 'Hosting'), ['/request-project/step-4'])?></li>
	<li class="active"><span>Stap 5</span><?= Html::a(Yii::t('request-project', 'Website promotion'), ['/request-project/step-5']) ?></li>
	<li class="active"><span>Stap 6</span><?= Html::a(Yii::t('request-project', 'Overview'), ['/request-project/overview']) ?></li>
</ul>
			
	<?php if (Yii::$app->session->has('customer')) { 
		echo '<div class="alert alert-danger" role="alert">Dit project wordt aangemaakt voor de klant <b>' . Yii::$app->session->get('customer')->name . '</b></div>'; 
	} ?>

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
				<?= Html::a(Yii::t('common', 'Cancel'), Url::to(['/request-project/clear-steps']), ['class' => 'btn btn-warning']) ?>
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