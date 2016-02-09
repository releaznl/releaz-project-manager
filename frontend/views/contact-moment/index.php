<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contact Moments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-moment-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('app', 'Create Contact Moment'), ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	    	'filterModel' => $searchProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	
// 	            'id',
	        	[
	        		'attribute' => 'moment',
	        		'format' => 'datetime',
	        		'filter' => '',
	       	 	],
	            [
	            	'attribute' => 'customer_id',
	            	'value' => 'customer.name',
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
