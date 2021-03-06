<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('customer','Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('customer','Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer_id',
            'user_id',
            'name',
            'address',
            'zip_code',
            // 'location',
            // 'phone_number',
            // 'website',
            // 'kvk',
            // 'btw',
            // 'email_address:email',
            // 'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
