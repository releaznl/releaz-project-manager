<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('project','Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= (\Yii::$app->user->can('createProject')) ? Html::a(Yii::t('project','Create Project'), ['create'], ['class' => 'btn btn-success']) : Html::a(Yii::t('project', 'Request Project'), ['/request-project'], ['class' => 'btn btn-success']); ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'columns' => [
	            //['class' => 'yii\grid\SerialColumn'],
	
	            'description',
	            [
	                'attribute' => 'client_id',
	                'value' => 'client.name',
	            ],
	            [
	                'attribute' => 'projectmanager_id',
	                'value' => 'projectmanager.username',
	            ],
	        	[
	        		'attribute' => 'status',
	        		'value' => 'statusName',
	    		],
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
