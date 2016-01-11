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

    <p>
        <?= Html::a(Yii::t('app', 'Create Contact Moment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//             'id',
            'moment',
        	[
        		'attribute' => 'customer_id',
        		'value' => 'customer.name',
        	],
            'comment',
        	[
        		'attribute' => 'creator_id',
        		'value' => 'creator.username'
    		],
        	[
        		'attribute' => 'updater_id',
        		'value' => 'updater.username'
        	],
            // 'datetime_added',
            // 'datetime_updated',
            // 'deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
