<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>

	<div class="block">
	    <p>
	        <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
	        <?= Html::a(Yii::t('app','Create contact moment'), ['/contact-moment/create', 'cid' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
	    </p>
	
	    <?= DetailView::widget([
	        'model' => $model,
	        'attributes' => [
	            'name',
	            'address',
	            'zip_code',
	            'location',
	            'phone_number',
	            'website',
	            'kvk',
	            'btw',
	            'email_address:email',
	            'description',
	        ],
	    ]) ?>
    </div>

</div>
