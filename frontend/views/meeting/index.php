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
	    <p>
	        <?= Html::a(Yii::t('app', 'Create Meeting'), ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	
// 	            'id',
	            'contact_moment_id',
	            'moment:datetime',
	            'comment',
	            'creator_id',
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
