<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('project','Projects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <?php
	    
	    if ($dataProvider2) {
		    if ($dataProvider2->getTotalCount() !== 0) {
		    	echo '<h2>Nieuwe projectaanvragen</h2>';
		    	echo GridView::widget([
			        'dataProvider' => $dataProvider2,
		    		'filterModel' => $searchModel2,
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
			        		'filter' => Html::activeDropDownList($searchModel2, 'status', Project::statusses(), ['prompt' => 'Alles', 'class' => 'form-control']),
			    		],
			
			            ['class' => 'yii\grid\ActionColumn'],
			        ],
		    	]);
		    }
	    }
	    	
	    ?>
	
		<h2>Projecten</h2>
		
		<p>
	        <?= (\Yii::$app->user->can('createProject')) ? Html::a(Yii::t('project','Create Project'), ['create'], ['class' => 'btn btn-success']) : Html::a(Yii::t('project', 'Request Project'), ['/request-project'], ['class' => 'btn btn-success']); ?>
	    </p>
	    
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider1,
        	'filterModel' => $searchModel1,
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
			        'filter' => Html::activeDropDownList($searchModel2, 'status', Project::statusses(), ['prompt' => 'Alles', 'class' => 'form-control']),
	    		],
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
