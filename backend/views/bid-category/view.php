<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BidCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Bid Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-category-view">

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
            'ordering',
            'description:ntext',
            'creator_id',
            'datetime_added',
            'updater_id',
            'datetime_updated',
            'deleted',
        ],
    ]) ?>

</div>
