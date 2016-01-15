<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('app','Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
	    </p>
	
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	    	'filterModel' => $searchProvider,
	        'columns' => [
	            // ['class' => 'yii\grid\SerialColumn'],
	
	            // 'customer_id',
	            // 'user_id',
	            'name',
	            'address',
	            'zip_code',
	            'location',
	            'phone_number',
	            'website',
// 	            'kvk',
// 	            'btw',
	            'email_address:email',
// 	            'description',
	
	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
