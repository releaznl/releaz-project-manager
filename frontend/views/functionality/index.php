<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('functionality','Functionalities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functionality-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('functionality','Create Functionality'), ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	
	            'functionality_id',
	            'description',
	        	[
	        		'name' => Yii::t('functionality','Total Price'),
	        		'value' => $data->getTotalPrice(),
	    		],
	            'datetime_added:datetime',
	            'project_id',
	            'name',
	            'creator_id',
	            'datetime_updated:datetime',
	            'updater_id',
	            // 'deleted:boolean',
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
