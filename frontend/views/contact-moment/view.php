<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ContactMoment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contact Moments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-moment-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a(Yii::t('app', 'Schedule Meeting'), ['/meeting/create', 'cmid' => $model->id], ['class' => 'btn btn-primary']) ?>
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
	            'moment:datetime',
	        	[
	        		'attribute' => 'customer_id',
	        		'value' => $model->customer->name,
	    		],
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
// 	            'deleted',
	        ],
	    ]) ?>
	</div>
</div>
