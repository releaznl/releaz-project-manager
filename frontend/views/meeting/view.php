<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Meeting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Meetings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meeting-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
	            'class' => 'btn btn-danger',
	            'data' => [
	                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
	                'method' => 'post',
	            ],
	        ]) ?>
	    </p>
	
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
// 	            'id',
	        	[
	        		'attribute' => 'contact_moment_id',
	        		'format' => 'raw',
	        		'value' => Html::a($model->contact_moment_id, ['/contact-moment/view', 'id' => $model->contact_moment_id]),
	    		],
	            'moment:datetime',
	            'comment',
	        	[
	        		'attribute' => 'creator_id',
	        		'value' => $model->creator->username,
	    		],
	            'datetime_added:datetime',
	        	[
	        		'attribute' => 'updater_id',
	        		'value' => $model->updater->username,
	        	],
	            'datetime_updated:datetime',
	        ],
	    ]) ?>
	</div>
</div>
