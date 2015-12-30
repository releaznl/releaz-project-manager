<?php

use common\models\Todo;

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Todos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="block">
    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->todo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->todo_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'todo_id',
            'name',
            'description',
        	[
        		'attribute' => 'status_id',
        		'format' => 'raw',
        		'value' => Todo::statusses()[$model->status_id],
    		],
        	[
        		'attribute' => 'functionality_id',
        		'format' => 'raw',
        		'value' => html::a($model->functionality->name, ['functionality/view', 'id' => $model->functionality_id]),
    		],
        	[
        		'attribute' => 'creator_id',
        		'format' => 'raw',
        		'value' => $model->creator->username,
    		],
            'datetime_added:datetime',
            //'deleted',
        	[
        		'attribute' => 'updater_id',
        		'formate' => 'raw',
        		'value' => $model->updater->username,
    		],
            'datetime_updated:datetime',
        ],
    ]) ?>
    
    <h2>Bestanden voor deze Todo</h2>
    
    <p><?= Html::a(Yii::t('file','Create file'),['/file/create', 'tid' => $model->todo_id], ['class' => 'btn btn-success']) ?></p>
    
    <?= GridView::widget([
    		'dataProvider' => $dataProvider,
    		'columns' => [
    			'name',
    			'description',
    			'creator.username',
    			'datetime_added',
	            ['class' => 'yii\grid\ActionColumn', 'controller' => '/file'],
    	]
    ]); ?>
	</div>
</div>
