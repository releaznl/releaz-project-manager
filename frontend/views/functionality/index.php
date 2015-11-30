<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('funcitonality','Functionalities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="functionality-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('functionality','Create Functionality'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'functionality_id',
            'description',
            'datetime_added:datetime',
            // 'deleted',
            'project_id',
            'name',
            'creator_id',
            'datetime_updated:datetime',
            'updater_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
