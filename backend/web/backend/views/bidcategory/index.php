<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bid Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bid Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'order',
            'description:ntext',
            'created_by',
            // 'datetime_added',
            // 'updated_by',
            // 'datetime_updated',
            // 'deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
