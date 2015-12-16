<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use common\models\BidPart;

/* @var $this yii\web\View */
/* @var $model common\models\BidCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('bidCategory', 'Bid Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bid-category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(\Yii::t('common', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(\Yii::t('common', 'Delete'), ['delete', 'id' => $model->id], [
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
            'deleted:boolean',
        ],
    ]) ?>
    
    <?= GridView::widget([
    		'dataProvider' => new ActiveDataProvider([
    				'query' => $model->getBidParts(),
    		]),
    		'columns' => [
    				'ordering',
    				'name',
    				'description',
    				'price',
    				'deleted:boolean',
    				['class' => 'yii\grid\ActionColumn', 'controller' => 'bid-part'],
    		]
    ])
    ?>

</div>
