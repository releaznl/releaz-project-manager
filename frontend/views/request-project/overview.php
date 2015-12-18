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
	
	<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'showFooter' => true,
			'columns' => [
					'name',
					'description',
					[
						'attribute' => 'price',
						'footer' => \common\components\grid\TotalColumn::pageTotal($dataProvider->models, 'price'),
					],
			]
	]) ?>
	
	<?= Html::a(Yii::t('common', 'Last step'), Url::to(['/request-project/step-5']), ['class' => 'btn btn-primary'])?>
	<?= Html::a(Yii::t('common', 'Create'), Url::to(['/request-project/generate-project']), ['class' => 'btn btn-success']) ?>
</div>