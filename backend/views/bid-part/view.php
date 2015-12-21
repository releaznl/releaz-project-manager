<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BidPart */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bid Parts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-part-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            'bid_category_id',
            'description:ntext',
            'price',
            'file_upload:boolean',
            'explanation:boolean',
        	'monthly_costs:boolean',
            'ordering',
            'creator_id',
            'datetime_added:datetime',
            'updater_id',
            'datetime_updated:datetime',
            'deleted:boolean',
        ],
    ]) ?>

</div>
