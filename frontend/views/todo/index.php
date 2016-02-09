<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a('Create Todo', ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],
	
	            'todo_id',
	            'name',
	            'description',
	            'datetime_added',
	            'deleted',
	            // 'status_id',
	            // 'creator_id',
	            // 'functionality_id',
	            // 'datetime_updated',
	            // 'updater_id',
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
