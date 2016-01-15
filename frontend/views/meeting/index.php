<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Meetings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	    	'filterModel' => $searchProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	
// 	            'id',
// 	            'contact_moment_id',
	            'moment:datetime',
	        	[
	        		'attribute' => 'contact_moment_id',
	        		'label' => Yii::t('customer', 'Customer'),
	        		'format' => 'raw',
	        		'value' => function ($data) {
	        			return Html::a($data->contactMoment->customer->name, ['/customer/view', 'id' => $data->contactMoment->customer_id]);
	        		},
	        	],
	            'comment',
	        	[
	        		'attribute' => 'creator_id',
	        		'value' => 'creator.username',
	    		],
	            // 'updater_id',
	            // 'datetime_added',
	            // 'datetime_updated',
	            // 'deleted',
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
