<?php

use common\models\Todo;

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Functionality */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Projects'), 'url' => ['/project/index']];
$this->params['breadcrumbs'][] = ['label' => $model->project->description, 'url' => ['/project/view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functionality-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
    <p>
        <?= Html::a(Yii::t('common','Update'), ['update', 'id' => $model->functionality_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('common','Delete'), ['delete', 'id' => $model->functionality_id], [
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
            'name',
            'description',                        
        	'price:currency',
        	[
        		'attribute' => 'project_id',
                'format' => 'raw',
        		'value' => Html::a($model->project->description, ['project/view', 'id' => $model->project_id]),
    		],
        	[
        		'label' => Yii::t('user','Creator'),
        		'value' => $model->creator->username,
    		],
        	'datetime_added:datetime',
        	[
        		'label' => Yii::t('user', 'Updater'),
        		'value' => $model->updater->username,
   			],
        	'datetime_updated:datetime',
        ],
    ]) ?>
    
    <?= 
    	$this->render('../todo/_form', ['model' => $todo]);
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
            	'class' => 'yii\grid\SerialColumn',
    		],

        	'name',
            'description',
        	[
        		'attribute' => 'status_id',
        		'format' => 'raw',
        		'value' => function ($model) {
        			return Todo::statusses()[$model->status_id];
    			} ,
    		],

            [
            	'class' => 'yii\grid\ActionColumn',
            	'controller' => 'todo',
    		],
        ],
    ]); ?>
    </div>

</div>
