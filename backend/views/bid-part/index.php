<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bid Parts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-part-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bid Part', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'bid_category_id',
            'description:ntext',
            'price',
            // 'file_upload:boolean',
            'explanation:boolean',
            'ordering',
            // 'creator_id',
            // 'datetime_added:datetime',
            // 'updater_id',
            // 'datetime_updated:datetime',
            'deleted:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
