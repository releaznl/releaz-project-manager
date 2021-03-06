<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\File */

$this->title = $model->name;

if (isset($model->project_id)) {
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
	$this->params['breadcrumbs'][] = ['label' => $model->project->description, 'url' => ['/project/view', 'id' => $model->project_id]];
	$this->params['breadcrumbs'][] = $this->title;
} else  {
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->functionality->project->description, 'url' => ['/project/view', 'id' => $model->todo->functionality->project_id]];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->functionality->name, 'url' => ['/functionality/view', 'id' => $model->todo->functionality_id]];
	$this->params['breadcrumbs'][] = ['label' => $model->todo->name, 'url' => ['/todo/view', 'id' => $model->todo_id]];
	$this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="file-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a('Update', [Yii::t('common','update'), 'id' => $model->file_id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a('Delete', [Yii::t('common','delete'), 'id' => $model->file_id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => Yii::t('common','Are you sure you want to delete this item?'),
	                'method' => 'post',
	            ],
	        ]) ?>
	    </p>
	
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	//             'file_id',
	            'name',
	            'description',
	        	[
	        		'attribute' => 'project.id',
	        		'format' => 'raw',
	        		'label' => 'Project',
	        		'value' => (isset($model->project_id)) ? Html::a($model->project->description, ['/project/view', 'id' => $model->project_id]) : null,
	    		],
	        	[
	        		'attribute' => 'todo.description',
	        		'label' => 'Todo',
	        		'format' => 'raw',
	        		'value' => (isset($model->todo_id)) ? Html::a($model->todo->name, ['/todo/view', 'id' => $model->todo_id]) : null,
	    		],
	            'creator.username',
	            'datetime_added',
	            'updater.username',
	            'datetime_updated',
	//             'deleted:boolean',
	        ],
	    ]) ?>
	</div>
</div>
